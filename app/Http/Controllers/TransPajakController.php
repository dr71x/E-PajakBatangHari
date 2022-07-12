<?php

namespace App\Http\Controllers;

use App\Models\pajak;
use App\Models\User;
use App\Models\transpajak;
use App\Models\transpajak_detail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransPajakController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index(){
        $denda = transpajak::where('id',\Auth::user()->id)->orderBy('created_at','DESC')->first();
        $data['pajak'] = pajak::where('NOP',\Auth::user()->NOP)->first();

        $skrng = date('Y');
        if ($denda != null) {
            $terakhir = $denda->created_at->format('Y');
            if ($skrng - $terakhir > 2) {
                $bayar = ($denda->amount * 0.01) * 12;
                $data['bayar'] = number_format($bayar,0,'','');
            }else {
                $data['bayar'] = 0;
            }
        }else{
            $data['bayar'] = 0;
        }
        return view('user.bayar',$data);
    }

    public function permintaan(Request $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::where('id', $request->userid)->first();
            $tanggal = date('ymd');
            $donation = transpajak::create([
                'transaction_id' => $tanggal . '-' . Str::random(3),
                'userid' => $request->userid,
                'totalnjop' => $request->totalnjop,
                'tkp' => $request->tkp,
                'pbb' => $request->pbb,
                'njkp' => $request->njkp,
                'amount' => floatval($request->bayarpajak),
                'NOP' => $request->nop,
            ]);
            for ($i=0; $i < count($request->luas) ; $i++) { 
                $simpan = transpajak_detail::create([
                    'transaction_id' => $donation->transaction_id,
                    'luas' => $request->luas[$i],
                    'jenis' => $request->jenis[$i],
                    'nilai' => $request->nilai[$i],
                    'njop' => $request->njop[$i],
                ]);
            }
            $payload = [
                'transaction_details' => [
                    'order_id'      => $donation->transaction_id,
                    'gross_amount'  => $request->bayarpajak,
                ],
                'customer_details' => [
                    'first_name'    => $user->name,
                    'email'         => $user->email,
                    'phone'         => $user->detail->nohp,
                ],
            ];
            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $donation->snap_token = $snapToken;
            $donation->save();
            $this->response['snap_token'] = $snapToken;
        });
         return response()->json($this->response);
    }

    public function histori(){
        return view('user.histori');
    }

    public function historitable(){
        $histori = transpajak::where('userid', Auth::user()->id)->orderBy('transaction_id','DESC')->get();
        return view('user.historidata', compact('histori'));
    }

    public function notification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        DB::transaction(function () use ($notif) {

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;
            $donation = transpajak::where('transaction_id', $orderId)->first();

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $donation->setStatusPending();
                    } else {
                        $donation->setStatusSuccess();
                    }
                }
            } elseif ($transaction == 'settlement') {
                $donation->setStatusSuccess();
            } elseif ($transaction == 'pending') {
                $donation->setStatusPending();
            } elseif ($transaction == 'deny') {
                $donation->setStatusFailed();
            } elseif ($transaction == 'expire') {
                $donation->setStatusExpired();
            } elseif ($transaction == 'cancel') {
                $donation->setStatusFailed();
            }

            $lama = pajak::where('NOP', $donation->NOP)->first();
            $tanggal = pajak::where('NOP', $donation->NOP)->first();
            $tanggal->tanggal = Carbon::parse($lama)->addYear();
            $tanggal->save();

        });
        return;
    }

    public function denda($nopajak){
        $data['denda'] = transpajak::where('nopajak', $nopajak)->orderBy('created_at','DESC')->first();
        return view('user.denda', $data);
    }

    public function bumi($id){
        $data = pajak::where('NOP',$id)->first();
        return response()->json($data->luas_bumi);
    }

    public function bangunan($id){
        $data = pajak::where('NOP',$id)->first();
        return response()->json($data->luas_bangunan);
    }
}

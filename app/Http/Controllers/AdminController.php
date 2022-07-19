<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\pajak;
use App\Models\pengumuman;
use App\Models\transpajak;
use App\Models\transpajak_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if (\Auth::user()->level == "admin") {
            $data['success'] = transpajak::where('status','success')->count();
            $data['pending'] = transpajak::where('status','pending')->count();
            $data['total_semua'] = transpajak::where('status','success')->sum('amount');
            $bulan = transpajak::where('status','success')->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m-Y');
            });
            $data['total'] = transpajak::select(DB::raw("CAST(SUM(amount) as int) as total"),DB::raw('extract(month from "created_at") as month'))->where('status','success')->groupBy('month')->pluck('total');
            $kategori = [];
            // $total_kategori = [];
            foreach ($bulan as $item) {
                $kategori[] = Carbon::parse($item[0]->created_at)->format('M');
            }
            // // dd($total_kategori);
            // $data['total'] = $total_kategori;
            $data['bulan'] = $kategori;
            return view('home.index',$data);
        }elseif (\Auth::user()->level == "kades") {
            $data['success'] = transpajak::where('status','success')->count();
            $data['pending'] = transpajak::where('status','pending')->count();
            $data['total_semua'] = transpajak::where('status','success')->sum('amount');
            $bulan = transpajak::where('status','success')->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m-Y');
            });
            $data['total'] = transpajak::select(DB::raw("CAST(SUM(amount) as int) as total"),DB::raw('extract(month from "created_at") as month'))->where('status','success')->groupBy('month')->pluck('total');
            $kategori = [];
            // $total_kategori = [];
            foreach ($bulan as $item) {
                $kategori[] = Carbon::parse($item[0]->created_at)->format('M');
            }
            // // dd($total_kategori);
            // $data['total'] = $total_kategori;
            $data['bulan'] = $kategori;
            return view('home.index',$data);
        }
        else {
            $data['success'] = transpajak::where('status','success')->where('userid',\Auth::user()->id)->count();
            $data['pending'] = transpajak::where('status','pending')->where('userid',\Auth::user()->id)->count();
            $data['total'] = transpajak::where('status','success')->where('userid',\Auth::user()->id)->sum('amount');
            return view('home.indexuser',$data);
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function berita(){
        $data['berita'] = berita::get();
        return view('user.berita',$data);
    }

    public function editberita($id){
        $data['berita'] = berita::find($id);
        return view('user.editberita',$data);
    }

    public function editberitasimpan(Request $request){
        $berita = berita::find($request->id);
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        if ($request->hasFile('gambar')) {
            $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
            $path = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
            $berita->type = $ext;
            $berita->gambar = $path;
        }
        $berita->save();

        return redirect('/berita')->with('success', 'Berita berhasil Diedit');
    }
    
    public function beritasimpan(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
        $path = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
        $berita = new berita();
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->type = $ext;
        $berita->gambar = $path;
        $berita->save();

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function beritahapus($id){
        $berita = berita::find($id);
        $berita->delete();
        return redirect('/berita')->with('success', 'Berita berhasil dihapus');
    }

    public function pengumuman(){
        $data['pengumuman'] = pengumuman::get();
        return view('user.pengumuman',$data);
    }

    public function editpengumuman($id){
        $data['pengumuman'] = pengumuman::find($id);
        return view('user.editpengumuman',$data);
    }

    public function editpengumumansimpan(Request $request){
        $pengumuman = pengumuman::find($request->id);
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        if ($request->hasFile('gambar')) {
            $exty = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
            $path = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
            $pengumuman->type = $exty;
            $pengumuman->gambar = $path;
        }
        $pengumuman->save();

        return redirect('/pengumuman')->with('success', 'Pengumuman berhasil Diedit');
    }

    public function pengumumansimpan(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $exty = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
        $path = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
        $berita = new pengumuman();
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->type = $exty;
        $berita->gambar = $path;
        $berita->save();

        return back()->with('success', 'Berita berhasil ditambahkan');
    }

    public function pengumumanhapus($id){
        $berita = pengumuman::find($id);
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus');
    }

    public function pembayaranpajak(){
        return view('user.pembayranpajak');
    }

    public function pembayaranpajaktable(){
        $histori = transpajak::get();
        return view('user.historidata', compact('histori'));
    }

    public function ambildata($id){
        $data['data'] = transpajak_detail::where('transaction_id',$id)->get();
        return view('user.detaildata',$data);
    }

    public function laporan(){
        $data['donasi'] = transpajak::get();
        return view('laporan',$data);
    }

    public function cetak(Request $request){
        $data['tgl1'] = $request->tgl1;
        $data['tgl2'] = $request->tgl2;
        $data['total'] = transpajak::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->sum('amount');
        $data['donasi'] = transpajak::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->get();
        return view('cetak',$data);
    }

    public function getnotification(){
        $data['tanggal'] = date('d-M-Y');
        if (transpajak::where('status','success')->count() > 0) {
            $data['sum'] = transpajak::where('status','success')->where('created_at',Carbon::now()->format('Y-m-d'))->count();
        }else{
            $data['sum'] = 0;
        }
        
        return response()->json($data);
    }

    public function datanotification(){
        $data['notification'] = transpajak::where('status','success')->where('created_at',Carbon::now()->format('Y-m-d'))->get();
        return view('home.isi',$data);
    }

    public function pajak(){
        $data['pajak'] = pajak::orderBy('NOP','asc')->get();
        return view('user.pajak',$data);
    }

    public function pajaktambah (){
        return view('user.pajaktambah');
    }

    public function pajaksimpan(Request $request){
        $request->validate([
            'NOP' => 'required|unique:pajak,NOP',
            'luas_bumi' => 'required',
            'luas_bangunan' => 'required',
            'tunggakan' => 'required',
            'gambar' => 'required',
        ]);

        $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
        $gambar = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));

        $simpan = new pajak();
        $simpan->NOP = $request->NOP;
        $simpan->luas_bumi = $request->luas_bumi;
        $simpan->luas_bangunan = $request->luas_bangunan;
        $simpan->tunggakan = $request->tunggakan;
        $simpan->letak = $request->letak;
        $simpan->tanggal = $request->tanggal . ' 00:00:00';
        $simpan->gambar = $gambar;
        $simpan->type = $ext;
        $simpan->save();

        return redirect()->route('pajak')->with('success', 'Data berhasil ditambahkan');
    }

    public function editpajak($id){
        $data['pajak'] = pajak::where('NOP',$id)->first();
        return view('user.pajakedit',$data);
    }

    public function updatepajak(Request $request){
        $request->validate([
            'NOP' => 'required',
            'luas_bumi' => 'required',
            'luas_bangunan' => 'required',
            'tunggakan' => 'required',
        ]);
        $simpan = pajak::where('NOP',$request->NOP)->first();
        $simpan->NOP = $request->NOP;
        $simpan->luas_bumi = $request->luas_bumi;
        $simpan->luas_bangunan = $request->luas_bangunan;
        $simpan->tunggakan = $request->tunggakan;
        $simpan->letak = $request->letak;
        if ($request->gambar != NULL) {
            $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
            $gambar = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
            $simpan->gambar = $gambar;
            $simpan->type = $ext;
        }
        $simpan->tanggal = $request->tanggal. ' 00:00:00';
        $simpan->save();

        return redirect()->route('pajak')->with('success', 'Data berhasil diedit');
    }

    public function hapuspajak($id){
        $pajak = pajak::where('NOP',$id)->first();
        $pajak->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function cetakUser($id){
        $data['pajak'] = transpajak::where('transaction_id',$id)->first();
        $data['detail'] = transpajak_detail::where('transaction_id',$id)->get();
        return view('cetak_user',$data);
    }
}

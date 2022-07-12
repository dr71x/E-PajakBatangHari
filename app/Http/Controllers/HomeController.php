<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\berita;
use App\Models\pajak;
use App\Models\pengumuman;
use App\Models\userdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        return view('home.dashboard');
    }

    public function login(){
        return view('home.login');
    }

    public function proseslogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Login Success');
        }else{
            return back()->with('gagal','Email atau Password salah');
        }
    }

    public function register(){
        return view('home.register');
    }

    public function registersimpan(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:password_confirmation',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);

       if (pajak::where('NOP', $request->NOP)->first()) {
            $simpan = new User();
            $simpan->name = $request->name;
            $simpan->email = $request->email;
            $simpan->level = "user";
            $simpan->password = bcrypt($request->password);
            $simpan->NOP = $request->NOP;
            $simpan->save();

            $user = new userdetail();
            $user->user_id = $simpan->id;
            $user->nohp = $request->nohp;
            $user->alamat = $request->alamat;
            $user->save();
            return redirect()->route('login')->with('success', 'Register Berhasil');
       }else{
           return back()->with('gagal','NOP tidak terdaftar, Silahkan Hubungi Perangkat Desa Setempat')->withInput();
       }
    }

    public function baca(){
        $data['berita'] = berita::get();
        return view('home.bacaberita',$data);
    }

    public function pengumumanhome(){
        $data['pengumuman'] = pengumuman::get();
        return view('home.pengumuman',$data);
    }

    public function beritadetail($id){
        $data['berita'] = berita::where('id',$id)->first();
        return view('home.bacaberitadetail',$data);
    }

    public function pengumumandetail($id){
        $data['pengumuman'] = pengumuman::where('id',$id)->first();
        return view('home.pengumumandetail',$data);
    }

    public function tentangkami(){
        return view('home.tentangkmi');
    }

    public function aluresppt(){
        return view('home.aluresppt');
    }
}

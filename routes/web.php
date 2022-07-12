<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransPajakController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class ,'home'])->name('home');
Route::get('/login', [HomeController::class ,'login'])->name('login');
Route::post('/proseslogin', [HomeController::class ,'proseslogin'])->name('proseslogin');
Route::get('/register', [HomeController::class ,'register'])->name('register');
Route::post('/register/simpan',[HomeController::class, 'registersimpan']);
Route::get('/berita/home', [HomeController::class ,'baca'])->name('baca');
Route::get('/berita/home/{id}', [HomeController::class ,'beritadetail'])->name('beritadetail');
Route::get('/pengumuman/home', [HomeController::class ,'pengumumanhome'])->name('pengumumanhome');
Route::get('/pengumuman/home/{id}', [HomeController::class ,'pengumumandetail'])->name('pengumumandetail');
Route::get('/tentang/kami', [HomeController::class , 'tentangkami'])->name('tentangkami');
Route::get('/alur/esppt', [HomeController::class , 'aluresppt'])->name('aluresppt');

Route::middleware(['auth', 'CekLevel:admin,user,kades'])->group(function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/cetak/{id}', [AdminController::class, 'cetakUser'])->name('cetakUser');
});

Route::middleware(['auth', 'CekLevel:user'])->group(function () {
    Route::get('/bayar/pajak', [TransPajakController::class, 'index'])->name('bayar');
    Route::get('/histori/pajak', [TransPajakController::class, 'histori'])->name('histori');
    Route::get('/histori/pajak/table', [TransPajakController::class, 'historitable'])->name('historitable');
    Route::get('/denda/{nopajak}', [TransPajakController::class, 'denda'])->name('denda');
    Route::get('/pajak/bumi/{id}',[TransPajakController::class, 'bumi'])->name('bumi');
    Route::get('/pajak/bangunan/{id}',[TransPajakController::class, 'bangunan'])->name('bangunan');
});

Route::middleware(['auth', 'CekLevel:admin'])->group(function () {
    Route::get('/berita', [AdminController::class, 'berita'])->name('berita');
    Route::post('/berita/simpan', [AdminController::class, 'beritasimpan'])->name('beritasimpan');
    Route::get('/berita/hapus/{id}',[AdminController::class, 'beritahapus'])->name('beritahapus');
    Route::get('/pengumuman', [AdminController::class, 'pengumuman'])->name('pengumuman');
    Route::post('/pengumuman/simpan', [AdminController::class, 'pengumumansimpan'])->name('pengumumansimpan');
    Route::get('/pengumuman/hapus/{id}',[AdminController::class, 'pengumumanhapus'])->name('pengumumanhapus');
    Route::get('/edit/berita/{id}', [AdminController::class, 'editberita'])->name('editberita');
    Route::post('/edit/berita/simpan', [AdminController::class, 'editberitasimpan'])->name('editberitasimpan');
    Route::get('/pengumuman/edit/{id}', [AdminController::class, 'editpengumuman'])->name('editpengumuman');
    Route::post('/pengumuman/edit/simpan', [AdminController::class, 'editpengumumansimpan'])->name('editpengumumansimpan');
    Route::get('/pajak', [AdminController::class, 'pajak'])->name('pajak');
    Route::get('/pajak/tambah', [AdminController::class, 'pajaktambah'])->name('pajaktambah');
    Route::post('/pajak/simpan', [AdminController::class, 'pajaksimpan'])->name('pajaksimpan');
    Route::get('/pajak/edit/{id}', [AdminController::class, 'editpajak'])->name('editpajak');
    Route::post('/pajak/update', [AdminController::class, 'updatepajak'])->name('updatepajak');
    Route::get('/pajak/hapus/{id}',[AdminController::class, 'hapuspajak'])->name('hapuspajak');
});
Route::middleware(['auth', 'CekLevel:admin,kades'])->group(function () {
    Route::get('/pembayaran/pajak', [AdminController::class, 'pembayaranpajak'])->name('pembayaranpajak');
    Route::get('/pembayaran/pajak/table', [AdminController::class, 'pembayaranpajaktable'])->name('pembayaranpajaktable');
    Route::post('/cetak/laporan',[AdminController::class, 'cetak'])->name('cetak');
    Route::get('/laporan/keseluruhan',[AdminController::class, 'laporan'])->name('laporan');
    Route::get('/get/notification',[AdminController::class, 'getnotification'])->name('get-notification');
    Route::get('/data/notification',[AdminController::class, 'datanotification'])->name('data-notification');
    Route::get('/ambil/data/{id}',[AdminController::class,'ambildata']);
});
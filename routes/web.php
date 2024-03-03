<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\OtentikasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('beranda');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/visi_dan_misi', function () {
    return view('visi_dan_misi');
});

Route::get('/cara_kerja', function () {
    return view('cara_kerja');
});

Route::get('/tentang_dana_pintar', function () {
    return view('tentang_dana_pintar');
});

Route::get('/amal_pintar', function () {
        return view('amal_pintar');
});

Route::get('/berita_terkini', function () {
    return view('berita_terkini');
});

Route::get('/wilayah_pintar', function () {
    return view('wilayah_pintar');
});

Route::get('/hubungi_kami', function () {
    return view('hubungi_kami');
});

Route::get('/konfirmasi_donasi_uang', function () {
    return view('konfirmasi_donasi_uang');
})->middleware('auth');

Route::post('/proses-kirim-bukti-uang', [DonasiController::class, 'prosesDonasiUang'])->name('prosesDonasiUang');

Route::get('/konfirmasi_donasi_barang', function () {
    return view('konfirmasi_donasi_barang');
})->middleware('auth');

Route::post('/proses-kirim-bukti-barang', [DonasiController::class, 'prosesDonasiBarang'])->name('prosesDonasiBarang');

Route::get('/buat_akun', function () {
    return view('buat_akun');
});

Route::get('/masuk_akun', function () {
    return view('masuk_akun');
});

Route::post('/masuk_akun', [OtentikasiController::class, 'login'])->name('login');

Route::post('/logout', [OtentikasiController::class, 'logout'])->name('logout')->middleware('auth');
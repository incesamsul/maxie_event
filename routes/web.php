<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;
use App\Http\Controllers\Home;

use App\Http\Controllers\Penilai;

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

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



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [Home::class, 'index']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/register', [Home::class, 'register']);
Route::get('/verifikasi_tamu/{whatsapp}/{id_tamu}', [Admin::class, 'verifikasiTamu']);
 // CRUD TAMU
 Route::post('/create_tamu', [Admin::class, 'createTamu']);

Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,user,penilai']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/tamu', [Admin::class, 'tamu']);
        Route::get('/tamu/{status}', [Admin::class, 'tamu']);
        Route::get('/sambutan', [Admin::class, 'sambutan']);
        Route::get('/get_last_scanned', [Admin::class, 'getLastScanned']);
        Route::get('/clear_last_scanned', [Admin::class, 'clearLastScanned']);
        Route::get('/scanner', [Admin::class, 'scanner']);
        Route::get('/terima/{id_tamu}', [Admin::class, 'terimaTamu']);
        Route::get('/cek_tamu/{id_tamu}', [Admin::class, 'cekTamu']);

        Route::get('/rekap_tamu_hadir', [Admin::class, 'rekapTamuHadir']);
        Route::get('/rekap_tamu_hadir/{status}', [Admin::class, 'rekapTamuHadir']);

        Route::get('/rekap_tamu_tidak_hadir', [Admin::class, 'rekapTamuTidakHadir']);
        Route::get('/rekap_tamu_tidak_hadir/{status}', [Admin::class, 'rekapTamuTidakHadir']);
        
        // TAMU
        Route::post('/konfirmasi_tamu', [Admin::class, 'konfirmasiTamu']);
        Route::post('/cancel_konfirmasi_tamu', [Admin::class, 'cancelKonfirmasiTamu']);
        Route::post('/cadangkan_konfirmasi_tamu', [Admin::class, 'cadangkanKonfirmasiTamu']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);


        // CRUD TAMU
        Route::post('/create_tamu', [Admin::class, 'createTamu']);
        Route::post('/update_tamu', [Admin::class, 'updateTamu']);
        Route::post('/delete_tamu', [Admin::class, 'deleteTamu']);

    });
});


Route::get('/{id_tamu}', [Home::class, 'index']);
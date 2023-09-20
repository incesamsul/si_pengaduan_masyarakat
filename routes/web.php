<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;
use App\Http\Controllers\Home;
use App\Http\Controllers\LaporanPengaduanController;
use App\Http\Controllers\masyarakat;

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
Route::get('/', [LoginController::class, 'login']);


Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,pimpinan,masyarakat']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);

    Route::get('/laporan_pemetaan', [LaporanPengaduanController::class, 'laporanPemetaan']);


    Route::get('/laporan_pengaduan', [LaporanPengaduanController::class, 'laporanPengaduan']);
    Route::get('/laporan_pengaduan/create', [LaporanPengaduanController::class, 'create']);
    Route::post('/laporan_pengaduan/store', [LaporanPengaduanController::class, 'store']);
    Route::get('/laporan_pengaduan/edit/{id}', [LaporanPengaduanController::class, 'create']);
    Route::put('/laporan_pengaduan/update', [LaporanPengaduanController::class, 'update']);
    Route::get('/laporan_pengaduan/delete/{id}', [LaporanPengaduanController::class, 'delete']);
    Route::get('/status_laporan', [LaporanPengaduanController::class, 'status']);
    Route::get('/status_laporan/update/{status}/{id}', [LaporanPengaduanController::class, 'updateStatus']);
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:pimpinan']], function () {
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});

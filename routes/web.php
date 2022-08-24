<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\Desa\DesaController;
use App\Http\Controllers\Kecamatan\KecamatanController;
use App\Http\Controllers\Lokasi\LokasiController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
Route::post('/getlocationdashboard', [DashboardController::class, 'getLocationDashboard']);
Route::get('/ajaxKecamatan', [DashboardController::class, 'AjaxKecamatan'])->name('ajaxKecamatan');
Route::get('/getajaxdesa/{id}', [DashboardController::class, 'getAjaxDesa'])->name('getajaxdesa');
Route::get('/', [DashboardUserController::class, 'Home'])->name('home');
Route::post('/getlocation', [DashboardUserController::class, 'getLocation']);
Route::get('/getajaxuserdesa/{id}', [DashboardUserController::class, 'getAjaxDesa'])->name('getajaxuserdesa');
Route::get('/login', [LoginController::class, 'LoginView'])->name('login');
Route::post('/loginauth', [LoginController::class, 'LoginAuth'])->name('loginauth');

Route::post('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', 'Profil')->name('profil');
    Route::get('/editprofile', 'EditProfil')->name('editprofil');
    Route::post('/posteditprofil', 'PostEditProfil')->name('posteditprofil');
});

Route::controller(LokasiController::class)->prefix('lokasi')->name('lokasi.')->group(function () {
    Route::get('/lokasi', 'LokasiView')->name('lokasiview');
    Route::get('/tambahlokasi', 'TambahLokasi')->name('tambahlokasi');
    Route::post('/simpanlokasi', 'SimpanLokasi')->name('simpanlokasi');
    Route::get('/getdesa/ajax/{id}', 'GetDesa')->name('getDesa');
    Route::get('/editlokasi/{id_lokasi}', 'EditLokasi')->name('editlokasi');
    Route::post('/updatelokasi{id_lokasi}', 'UpdateLokasi')->name('updatelokasi');
    Route::post('/hapuslokasi/{id_lokasi}', 'HapusLokasi')->name('hapuslokasi');
});

// desa
Route::controller(DesaController::class)->prefix('desa')->name('desa.')->group(function () {
    Route::get('/desa', 'DesaView')->name('desaview');
    Route::get('/tambahdesa', 'TambahDesa')->name('tambahdesa');
    Route::post('/simpandesa', 'SimpanDesa')->name('simpandesa');
    Route::get('/editdesa/{id_desa}', 'EditDesa')->name('editdesa');
    Route::post('/updatedesa/{id_desa}', 'UpdateDesa')->name('updatedesa');
    Route::post('/hapusdesa/{id_desa}', 'HapusDesa')->name('hapusdesa');
});

//kecamatan
Route::controller(KecamatanController::class)->prefix('kecamatan')->name('kecamatan.')->group(function () {
    Route::get('/kecamatan', 'KecamatanView')->name('kecamatanview');
    Route::get('/tambahkecamatan', 'TambahKecamatan')->name('tambahkecamatan');
    Route::post('/simpankecamatan', 'SimpanKecamatan')->name('simpankecamatan');
    Route::get('/editkecamatan/{id_kecamatan}', 'EditKecamatan')->name('editkecamatan');
    Route::post('/updatekecamatan/{id_kecamatan}', 'UpdateKecamatan')->name('updatekecamatan');
    Route::post('/hapuskecamatan/{id_kecamatan}', 'HapusKecamatan')->name('hapuskecamatan');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

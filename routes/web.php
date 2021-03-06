<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Desa\DesaController;
use App\Http\Controllers\Kecamatan\KecamatanController;
use App\Http\Controllers\Lokasi\LokasiController;
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

Route::get('/dashboard',[DashboardController::class,'Dashboard'])->name('dashboard');
Route::get('/',[LoginController::class,'LoginView'])->name('login');
Route::post('/loginauth',[LoginController::class,'LoginAuth'])->name('loginauth');

Route::post('/logout',[LoginController::class,'Logout'])->name('logout');

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function(){
    Route::get('/profile','Profil')->name('profil');
    Route::get('/editprofile','EditProfil')->name('editprofil');
    Route::post('/posteditprofil','PostEditProfil')->name('posteditprofil');
});

Route::controller(LokasiController::class)->prefix('lokasi')->name('lokasi.')->group(function(){
    Route::get('/lokasi','LokasiView')->name('lokasiview');
    Route::get('/tambahlokasi','TambahLokasi')->name('tambahlokasi');
    Route::get('/lokasi','LokasiView')->name('lokasiview');
    Route::get('/lokasi','LokasiView')->name('lokasiview');
});

// desa
Route::controller(DesaController::class)->prefix('desa')->name('desa.')->group(function(){
    Route::get('/desa','DesaView')->name('desaview');
    Route::get('/tambahdesa','TambahDesa')->name('tambahdesa');
    Route::post('/simpandesa','SimpanDesa')->name('simpandesa');
    Route::get('/editdesa/{id_desa}','EditDesa')->name('editdesa');
    Route::post('/updatedesa/{id_desa}','UpdateDesa')->name('updatedesa');
    Route::post('/hapusdesa/{id_desa}','HapusDesa')->name('hapusdesa');
});

//kecamatan
Route::controller(KecamatanController::class)->prefix('kecamatan')->name('kecamatan.')->group(function(){
    Route::get('/kecamatan','KecamatanView')->name('kecamatanview');
    Route::get('/tambahkecamatan','TambahKecamatan')->name('tambahkecamatan');
    Route::post('/simpankecamatan','SimpanKecamatan')->name('simpankecamatan');
    Route::get('/editkecamatan/{id_kecamatan}','EditKecamatan')->name('editkecamatan');
    Route::post('/updatekecamatan/{id_kecamatan}','UpdateKecamatan')->name('updatekecamatan');
    Route::post('/hapuskecamatan/{id_kecamatan}','HapusKecamatan')->name('hapuskecamatan');
});
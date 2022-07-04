<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
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
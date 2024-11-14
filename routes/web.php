<?php

use App\Http\Controllers\Mahasiswa\MahasiswaResouceController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
Route::get('/admin/dashboard/user', [DashboardAdminController::class, 'user']);
// Route::get('/admin/dashboard/user/list', [DashboardAdminController::class, 'list_user']);
Route::get('/admin/dashboard/user/list', [MahasiswaResouceController::class, 'index']);
Route::get('/admin/dashboard/user/create', [MahasiswaResouceController::class, 'create']);
Route::post('/admin/dashboard/user/store', [MahasiswaResouceController::class, 'store'])->name('admin.user.store');

Route::put('/admin/dashboard/user/{id}', [MahasiswaResouceController::class, 'store'])->name('admin.user.update.put');
Route::delete('/admin/dashboard/user/{id}', [MahasiswaResouceController::class, 'store'])->name('admin.user.delete.delete');

// BELUM DIBUATKAN CONTROLLER DAN MODEL
Route::get('/login',[LoginController::class,'index'])->name('loginpage');
Route::post('/login/store',[LoginController::class,'store'])->name('loginpage.store');

Route::post('/logout',[LoginController::class,'logout'])->name('loginpage.logout');

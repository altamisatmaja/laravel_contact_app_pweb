<?php

use App\Http\Controllers\DashboardAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardAdminController::class, 'index']);
Route::get('/admin/dashboard/user', [DashboardAdminController::class, 'user']);
Route::get('/admin/dashboard/user/list', [DashboardAdminController::class, 'list_user']);

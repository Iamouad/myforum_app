<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('reject-user', [AdminController::class, 'rejectUser']);
Route::post('approve-user', [AdminController::class, 'approveUser']);
Route::post('change-permission', [AdminController::class, 'changePermission']);
Route::get('/pendings', [AdminController::class, 'pendedUsers'])->name("pending");

Route::get('/users', [AdminController::class, 'getUsers'])->name("users");



Route::get('/', function () {
    return view('layouts.home');
})->name('home');

Route::get('/pended', function () {
    return view('layouts.pended');
})->name('pended');



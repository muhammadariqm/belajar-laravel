<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Auth;





Route::get('/', function () {
    return view('login');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profil', [AuthController::class, 'profil'])->middleware('auth');
Route::get('/profil/download', [ProfilController::class, 'downloadPDF'])->middleware('auth');

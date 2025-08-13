<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;



// Menampilkan halaman login (GET)
Route::get('/login', function () {
    return view('login'); // langsung return view login
})->name('login');

Route::get('/about', function () {
    return view('about');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/setings', function () {
    return view('setings');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profil', [AuthController::class, 'profil'])->middleware('auth');
Route::get('/profil/download', [ProfilController::class, 'downloadPDF'])->middleware('auth');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/profil/setings', [ProfilController::class, 'setings'])->name('profil.setings');
Route::post('/update-profile-picture', [ProfilController::class, 'updatePhoto'])->name('update.photo');
Route::put('/update-password', [ProfilController::class, 'updatePassword'])->name('password.update');
Route::post('/update-photo-position', [ProfilController::class, 'updatePhotoPosition'])->name('update.photo.position');

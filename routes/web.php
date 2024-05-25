<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
use App\Models\Fasilitas;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');


Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});




// lapangan
Route::resource('fasilitas', FasilitasController::class);

// Jadwal
Route::resource('jadwal', JadwalController::class);

// Pembayaran
Route::resource('pembayaran', PembayaranController::class);

// Booking
Route::resource('booking', BookingController::class);
Route::post('booking/cetak-resi-booking', [BookingController::class, 'cetakResiBooking'])->name('cetak-resi-booking');

// user
Route::resource('user', UserController::class);

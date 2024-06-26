<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Models\Booking;
use App\Models\Fasilitas;
use App\Models\Jadwal;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// auth


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});



Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Voucher


    // Booking
    Route::resource('booking', BookingController::class);
    Route::post('booking/cetak-resi-booking', [BookingController::class, 'cetakResiBooking'])->name('cetak-resi-booking');
    Route::delete('booking/cancel-booking/{id}', [BookingController::class, 'cancelBooking'])->name('cancel-booking');


    // user
    Route::resource('user', UserController::class);



    //* Harus Admin
    Route::middleware('role:admin')->group(function () {

        // Jadwal
        Route::resource('jadwal', JadwalController::class);
        Route::post('jadwal/modal-bayar', [JadwalController::class, 'modalJadwalBayar'])->name('modal-jadwal-bayar');
        Route::post('jadwal/selesai', [JadwalController::class, 'selesaiJadwal'])->name('selesai-jadwal');


        // voucher admin
        Route::resource('voucher', VoucherController::class);


        // lapangan fasilitas
        Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
        Route::get('fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
        Route::post('fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
        Route::get('fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
        Route::put('fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
        Route::delete('fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');


        // Pembayaran
        Route::resource('pembayaran', PembayaranController::class);
        Route::post('pembayaran/cetak-bukti', [PembayaranController::class, 'cetakBukti'])->name('cetak-bukti-bayar');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


        // laporan
        Route::get('laporan/pembayaran', [LaporanController::class, 'laporanPembayaran'])->name('laporan-pembayaran');
        Route::post('laporan/pembayaran', [LaporanController::class, 'cetakPembayaranPdf'])->name('cetak-pembayaran-pdf');
        Route::get('laporan/jadwal', [LaporanController::class, 'laporanJadwal'])->name('laporan-jadwal');
        Route::post('laporan/jadwal', [LaporanController::class, 'cetakJadwalPdf'])->name('cetak-jadwal-pdf');
    });
});



// fasilitas
Route::get('fasilitas/{id}', [FasilitasController::class, 'show'])->name('fasilitas.show');








// Route::resource('fasilitas', FasilitasController::class);

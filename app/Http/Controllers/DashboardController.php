<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Pembayaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bulanIni = Carbon::now()->month;
        $pendapatanBulanIni = Pembayaran::where('status_pembayaran', 'Lunas')->whereMonth('created_at', $bulanIni)->sum('total');
        $jadwalAktif = Jadwal::where('status', 'Aktif')->count();
        $jumlahUser = User::count();
        $bookingPending = Booking::where('status', 'pending')->count();
        $data = [
            'pendapatan' => $pendapatanBulanIni,
            'jadwal' => $jadwalAktif,
            'users' => $jumlahUser,
            'booking' => $bookingPending
        ];
        return view('dashboard.index', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    // Pembayaran
    public function laporanPembayaran()
    {
        return view('laporan.laporanPembayaran', ['pembayaran' => Pembayaran::latest()->get()]);
    }

    public function cetakPembayaranPdf(Request $request)
    {
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $pembayaran = Pembayaran::whereDate('created_at', '>=', $request->tanggal_awal)->whereDate('created_at', '<=', $request->tanggal_akhir)->get();
        } elseif ($request->tanggal_awal) {
            $pembayaran = Pembayaran::whereDate('created_at', '>=', $request->tanggal_awal)->get();
        } elseif ($request->tanggal_akhir) {
            $pembayaran = Pembayaran::whereDate('created_at', '<=', $request->tanggal_akhir)->get();
        } else {
            $pembayaran = Pembayaran::latest()->get();
        }

        $data = [
            'tanggal_cetak' => Carbon::now(),
            'pembayaran' => $pembayaran
        ];
        $pdf = Pdf::loadView('laporan.pembayaran_pdf', $data);
        return $pdf->download('laporan-pembayaran.pdf');
    }




    // Jadwal
    public function laporanJadwal()
    {
        return view(
            'laporan.laporanJadwal',
            [
                'jadwal' => Jadwal::latest()->get(),
            ]
        );
    }

    public function cetakJadwalPdf(Request $request)
    {
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $jadwal = Jadwal::whereDate('created_at', '>=', $request->tanggal_awal)->whereDate('created_at', '<=', $request->tanggal_akhir)->get();
        } elseif ($request->tanggal_awal) {
            $jadwal = Jadwal::whereDate('created_at', '>=', $request->tanggal_awal)->get();
        } elseif ($request->tanggal_akhir) {
            $jadwal = Jadwal::whereDate('created_at', '<=', $request->tanggal_akhir)->get();
        } else {
            $jadwal = Jadwal::latest()->get();
        }

        $data = [
            'jadwal' => $jadwal,
            'tanggal_cetak' => Carbon::now()
        ];

        $pdf = Pdf::loadView('laporan.jadwal_pdf', $data);
        return $pdf->download('laporan-jadwal.pdf');
    }
}

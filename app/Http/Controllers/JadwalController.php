<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jadwal.index', ['jadwal' => Jadwal::orderBy('created_at', 'desc')->get(), 'jadwalLunas' => Pembayaran::where('status_pembayaran', 'Lunas')->count(), 'jadwalDp' => Pembayaran::where('status_pembayaran', 'DP')->count()]);
    }

    public function modalJadwalBayar(Request $request)
    {
        $id_jadwal = $request->id_jadwal;
        $jadwal = Jadwal::find($id_jadwal);
        $tanggal_booking = Carbon::createFromFormat('Y-m-d', $jadwal->tanggal)->format('dmy');
        $invoice = 'INV-' . $tanggal_booking . '-' . 0 . $jadwal->id;

        $json = [
            'data' => view('pembayaran._modalBayar', ['jadwal' => $jadwal, 'invoice' => $invoice])->render()
        ];

        return response()->json($json);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memindahkan data booking ke table Jadwal
        $id_booking = $request->id_booking;
        $booking = Booking::find($id_booking);

        Jadwal::create([
            'id_lapangan' => $booking->id_lapangan,
            'user_id' => $booking->user_id,
            'total_harga' => $booking->total_harga,
            'tanggal' => $booking->tanggal_booking,
            'waktu_mulai' => $booking->waktu_mulai,
            'waktu_akhir' => $booking->waktu_akhir,
            'harga' => $booking->fasilitas->harga,
            'status' => 'Aktif'
        ]);

        $booking->update([
            'status' => 'Dikonfirmasi'
        ]);


        $json = [
            'success' => 'Data booking berhasil Dikonfirmasi',
            'id_booking' => $booking->id
        ];
        return response()->json($json);
    }

    public function selesaiJadwal(Request $request)
    {
        $id_jadwal = $request->id_jadwal;
        $jadwal = Jadwal::findOrFail($id_jadwal);

        $booking = Booking::where('user_id', $jadwal->user_id)
            ->where('id_lapangan', $jadwal->id_lapangan)
            ->where('status', 'Dikonfirmasi')
            ->where('total_harga', $jadwal->total_harga)
            ->whereTime('waktu_mulai', $jadwal->waktu_mulai)
            ->delete();


        if ($booking == 0) {
            $json = [
                'fail' => 'Booking sudah selesai'
            ];
        } else {

            $jadwal->update([
                'status' => 'Selesai'
            ]);

            $json = [
                'success' => 'Booking berhasil diselesaikan',
            ];
        }




        return response()->json($json);
    }


    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}

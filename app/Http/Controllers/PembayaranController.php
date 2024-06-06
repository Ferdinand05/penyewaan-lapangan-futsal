<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('pembayaran.index', ['pembayaran' => Pembayaran::latest()->get()]);
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
        $id_jadwal = $request->id_jadwal;
        $jadwal = Jadwal::findOrFail($id_jadwal);

        $data = [
            'invoice' => $request->invoice,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
            'total' => $jadwal->total_harga,
            'id_jadwal' => $id_jadwal,
            'tanggal_pembayaran' => Carbon::now(),
            'harga' => $jadwal->harga,
            'uang_diterima' => $request->uang_diterima,
        ];
        $uniqueBy = ['id', 'invoice'];
        $updateColumn = ['metode_pembayaran', 'status_pembayaran'];
        Pembayaran::query()->upsert($data, $uniqueBy, $updateColumn);

        $json = [
            'success' => 'Pembayaran berhasil dilakukan'
        ];


        return response()->json($json);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }

    public function cetakBukti(Request $request)
    {
        $id_pembayaran = $request->id_pembayaran;

        $data = [
            'pembayaran' => Pembayaran::findOrFail($id_pembayaran),
            'tanggal_cetak' => Carbon::now()
        ];

        $pdf = Pdf::loadView('pembayaran.buktiPembayaran', $data);
        return $pdf->download('bukti-pembayaran.pdf');
    }
}

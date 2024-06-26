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
    public function show(Request $request)
    {
        $json = [
            'data' => view('pembayaran._modalDetail', ['pembayaran' => Pembayaran::find($request->id_pembayaran)])->render()
        ];

        return response()->json($json);
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
    public function destroy(Request $request)
    {
        Pembayaran::destroy($request->id_pembayaran);

        $json = [
            'success' => 'Data pembayaran berhasil dihapus'
        ];

        return response()->json($json);
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

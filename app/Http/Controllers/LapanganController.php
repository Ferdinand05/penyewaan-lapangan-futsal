<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lapangan.index', ['lapangan' => Lapangan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'tipe_lapangan' => 'required',
            'harga' => 'required|min_digits:6',
            'deskripsi' => 'string',
            'gambar_lapangan' => 'image|mimes:png,jpg,jpeg'
        ]);

        $fileLapangan = $request->file('gambar_lapangan');
        if ($request->gambar_lapangan) {
            $namaLapangan = Str::slug($request->nama_lapangan);
            $extension = $fileLapangan->extension();

            $namaGambarLapangan = $namaLapangan . '.' . $extension;
            $fileLapangan->storeAs('image-lapangan', $namaGambarLapangan);
        } else {
            $namaGambarLapangan = null;
        }



        Lapangan::create([
            'nama_lapangan' => $request->nama_lapangan,
            'tipe_lapangan' => $request->tipe_lapangan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar_lapangan' => $namaGambarLapangan
        ]);

        return redirect()->to(route('lapangan.index'))->with('success', 'Data Lapangan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lapangan $lapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lapangan $lapangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lapangan $lapangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lapangan $lapangan)
    {
        //
    }
}

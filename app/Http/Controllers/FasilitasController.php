<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fasilitas.index', ['fasilitas' => Fasilitas::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'tipe_fasilitas' => 'required',
            'harga' => 'required|min_digits:6',
            'deskripsi' => 'string',
            'gambar_fasilitas' => 'image|mimes:png,jpg,jpeg'
        ]);

        $filefasilitas = $request->file('gambar_fasilitas');
        if ($request->gambar_fasilitas) {
            $namafasilitas = Str::slug($request->nama_fasilitas);
            $extension = $filefasilitas->extension();

            $namaGambarfasilitas = $namafasilitas . '.' . $extension;
            $filefasilitas->storeAs('image-fasilitas', $namaGambarfasilitas);
        } else {
            $namaGambarfasilitas = null;
        }



        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'tipe_fasilitas' => $request->tipe_fasilitas,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar_fasilitas' => $namaGambarfasilitas
        ]);

        return redirect()->to(route('fasilitas.index'))->with('success', 'Data fasilitas berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('fasilitas.show', ['fasilitas' => Fasilitas::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilitas $fasilitas)
    {
        //
    }
}

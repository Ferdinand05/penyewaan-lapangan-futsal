<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function edit(Request $request, $id)
    {
        return view('fasilitas.edit', ['fasilitas' => Fasilitas::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $fasilitas = Fasilitas::find($id);

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
            Storage::delete('image-fasilitas/' . $fasilitas->gambar_fasilitas);
        } else {
            $namaGambarfasilitas = $fasilitas->gambar_fasilitas;
        }

        $fasilitas->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'tipe_fasilitas' => $request->tipe_fasilitas,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar_fasilitas' => $namaGambarfasilitas
        ]);


        return redirect()->to(route('fasilitas.index'))->with('success', 'Data Fasilitas berhasil diUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id_fasilitas = $request->id_fasilitas;
        Fasilitas::destroy($id_fasilitas);

        $json = [
            'success' => 'Fasilitas berhasil dihapus!'
        ];

        return  response()->json($json);
    }
}

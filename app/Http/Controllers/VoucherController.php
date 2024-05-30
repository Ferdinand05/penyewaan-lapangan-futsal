<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('voucher.index', ['voucher' => Voucher::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_voucher' => 'required|unique:voucher,kode_voucher',
            'jenis_diskon' => 'required',
            'nilai_diskon' => 'required',
            'tanggal_mulai' => 'required',
            'batas_penggunaan' => 'required',
            'deskripsi' => 'required|string'
        ]);

        Voucher::create($request->all());


        return redirect()->to(route('voucher.index'))->with('success', 'Voucher berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id_voucher = $request->id_voucher;
        Voucher::destroy($id_voucher);


        $json = [
            'success' => 'Voucher berhasil dihapus'
        ];


        return response()->json($json);
    }
}

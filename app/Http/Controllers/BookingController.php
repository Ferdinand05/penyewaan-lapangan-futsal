<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->getRoleNames()[0] == 'admin') {
            // jika admin lakukan 
            return view('booking.index', ['bookings' => Booking::latest()->get()]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (Auth::user()) {
            $lapangan = Lapangan::find($request->lapangan);


            return view('booking.create', ['lapangan' => $lapangan, 'booking' => Booking::where('id_lapangan', $request->lapangan)->latest()->get()]);
        } else {
            return redirect()->back()->with('fail', 'Anda harus login sebelum melakukan booking!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $booking = Booking::where('id_lapangan', $request->id_lapangan)->whereDate('tanggal_booking', $request->tanggal_booking)
            ->where(function ($query) use ($request) {
                $query
                    ->whereTime('waktu_mulai', '<=', $request->waktu_akhir)
                    ->whereTime('waktu_akhir', '>', $request->waktu_mulai);
            })->get();

        // cari di table waktu_mulai yang lebih kecil sama dengan waktu akhir(request);


        if ($booking->isEmpty()) {
            Booking::create([
                'user_id' => Auth::user()->id,
                'id_lapangan' => $request->id_lapangan,
                'tanggal_booking' => $request->tanggal_booking,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_akhir' => $request->waktu_akhir,
                'total_harga' => $request->total_harga
            ]);

            $json = [
                'success' => 'Booking berhasil dilakukan!'
            ];
        } else {

            $json = [
                'fail' => 'Booking tidak tersedia dia tanggal & jam tersebut'
            ];
        }





        return response()->json($json);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        if (Auth::user()->getRoleNames()[0] == 'admin') {
            // jika admin lakukan 



        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        if (Auth::user()->getRoleNames()[0] == 'admin') {
            // jika admin lakukan 



        } else {
            return redirect()->back();
        }
    }
}

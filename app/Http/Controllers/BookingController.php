<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Fasilitas;
use App\Models\Lapangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
            $fasilitas = Fasilitas::find($request->fasilitas);


            return view('booking.create', ['fasilitas' => $fasilitas, 'booking' => Booking::where('id_lapangan', $request->fasilitas)->latest()->get()]);
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
                    ->whereTime('waktu_mulai', '<=', Carbon::parse($request->waktu_akhir)->floorMinute(60))
                    ->whereTime('waktu_akhir', '>', Carbon::parse($request->waktu_mulai)->floorMinute(60));
            })->get();

        // cari di table waktu_mulai yang lebih kecil sama dengan waktu akhir(request);

        $waktu_mulai = Carbon::parse($request->waktu_mulai)->floorMinute(60);
        $waktu_akhir = Carbon::parse($request->waktu_akhir)->floorMinute(60);

        if ($booking->isEmpty()) {
            $booking = Booking::create([
                'user_id' => Auth::user()->id,
                'id_lapangan' => $request->id_lapangan,
                'tanggal_booking' => $request->tanggal_booking,
                'waktu_mulai' => $waktu_mulai,
                'waktu_akhir' => $waktu_akhir,
                'total_harga' => $request->total_harga
            ]);

            $json = [
                'success' => 'Booking berhasil dilakukan!',
                'booking' => $booking
            ];
        } else {

            $json = [
                'fail' => 'Booking tidak tersedia dia tanggal & jam tersebut'
            ];
        }





        return response()->json($json);
    }


    public function cetakResiBooking(Request $request)
    {
        $id_booking = $request->id_booking;
        $booking = Booking::find($id_booking);
        $data = [
            'booking' => $booking
        ];
        $pdf = Pdf::loadView('booking.resi', $data);
        return $pdf->download('bukti-booking.pdf');
    }


    public function cancelBooking(Request $request)
    {
        $id_booking = $request->id_booking;
        $booking = Booking::find($id_booking);
        if (Auth::id() == $booking->user_id) {
            Booking::destroy($id_booking);
            $json = [
                'success' => 'Booking berhasil dicancel'
            ];
        } else {
            $json = [
                'fail' => 'Data Booking tidak sesuai'
            ];
        }

        return response()->json($json);
    }


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
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
    public function destroy(Request $request)
    {
        if (Auth::user()->getRoleNames()[0] == 'admin') {
            // jika admin lakukan 

            $id_booking = $request->id_booking;
            $booking = Booking::find($id_booking);
            if (Auth::id() == $booking->user_id) {
                Booking::destroy($id_booking);
                $json = [
                    'success' => 'Booking berhasil dicancel'
                ];
            } else {
                $json = [
                    'fail' => 'Data Booking tidak sesuai'
                ];
            }

            return response()->json($json);
        } else {
            return redirect()->back();
        }
    }
}

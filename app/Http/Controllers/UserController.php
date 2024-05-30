<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\View;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index', ['users' => User::all()]);
    }


    public function show($user_id)
    {

        if (Auth::id() == $user_id || Auth::user()->getRoleNames()[0] == 'admin') {
            $user = User::find($user_id);
            $booking = Booking::where('user_id', $user_id)->where('status', 'pending')->get();
            $riwayatBooking = Jadwal::where('user_id', Auth::id())->where('status', 'Selesai')->get();
            return view('user.profile', ['user' => $user, 'userBooking' => $booking, 'riwayatBooking' => $riwayatBooking]);
        } else {
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class UserController extends Controller
{

    public function index()
    {
    }


    public function show($user_id)
    {

        $user = User::find($user_id);
        $booking = Booking::where('user_id', $user_id)->get();

        return view('user.profile', ['user' => $user, 'userBooking' => $booking]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Voucher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index', ['fasilitas' => Fasilitas::all(), 'vouchers' => Voucher::latest()->get()]);
    }
}

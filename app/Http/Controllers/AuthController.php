<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            return redirect()->to(route('home'));
        } else {
            return throw ValidationException::withMessages([
                'email' => 'Kredensial anda tidak sesuai dengan catatan kami'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to(route('home'));
    }
}

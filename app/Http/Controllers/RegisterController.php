<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'no_telp' => ['required'],
            'password' => ['required', 'min:6']
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => $request->password
        ]);

        $user->assignRole('member');

        return redirect()->to(route('login'))->with('success', 'Akun berhasil dibuat silakan Login!');
    }
}

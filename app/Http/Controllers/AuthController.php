<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Check Akun User
        if ($email === 'userkelompok4@gmail.com' && $password === 'achaiuser') {
            return redirect()->route('catalog');
        }

        // Check Akun Admin
        if ($email === 'adminkelompok4@gmail.com' && $password === 'achaiadmin') {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Email/Username atau Password salah!'])->withInput();
    }

    public function register(Request $request)
    {
        // Simulasi pendaftaran sukses, langsung arahkan ke catalog
        return redirect()->route('catalog');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    public function register(Request $request)
    {
        // Validasi data input form register
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // butuh input name="password_confirmation" di view
        ]);

        // Simpan user baru ke database dengan password ter-hash
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default akun sebagai user/siswa
        ]);

        // Otomatis login-kan user abis register
        Auth::login($user);

        return redirect()->route('catalog')->with('success', 'Akun berhasil dibuat');
    }

    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kecocokan email dan password di database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role, kalau admin arahkan ke dashboard admin, kalau user ke catalog
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('catalog');
        }

        // Kalau gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        // Menggunakan $credentials dan validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Logika if untuk pengecekan Auth attempt
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Cek role untuk redirect admin atau user
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('catalog');
        }

        // Return back jika gagal login
        return back()->withErrors([
            'login' => 'Email atau password salah!',
        ])->onlyInput('email');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        // Menggunakan $validatedRequest untuk vlidasi
        $validatedRequest = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // User::create dengan bcrypt untuk password
        $user = User::create([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'password' => bcrypt($validatedRequest['password']),
            'role' => 'user',
        ]);

        // Otomatis login setelah register
        Auth::login($user);
        return redirect()->route('catalog')->with('success', 'Akun berhasil dibuat!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil keluar!');
    }
}
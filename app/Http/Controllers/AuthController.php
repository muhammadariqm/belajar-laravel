<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nim', 'password');

        // Cari user berdasarkan nim
        $user = User::where('nim', $credentials['nim'])->first();

        // Cek user dan password
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'NIM atau Password salah.');
        }

        // Login
        Auth::login($user);
        return redirect('/dashboard');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hapus session lama
        $request->session()->regenerateToken(); // Buat token baru
        return redirect('/')->with('success', 'Berhasil logout');
    }
}

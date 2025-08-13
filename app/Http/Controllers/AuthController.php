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
        $user = Auth::user(); // ambil user yang sedang login
        return view('dashboard', compact('user')); // kirim ke view
    }

    public function profil()
    {
        $user = Auth::user(); // ambil user yang sedang login
        return view('profil', compact('user')); // kirim ke view
    }

    // setings
    public function setings()
    {
        return view('setings', [
            'user' => Auth::user()
        ]);
    }


    public function showRegisterForm()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:users',
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'tgl_lahir' => 'required|string',
            'status' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'asal_sekolah' => 'required|string',
            'fakultas' => 'required|string',
            'prodi' => 'required|string',
            'asal_negara' => 'required|string',
            'telepon' => 'required|string',
            'agama' => 'required|string',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login');
    }


    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hapus session lama
        $request->session()->regenerateToken(); // Buat token baru
        return redirect('/')->with('success', 'Berhasil logout');
    }
}

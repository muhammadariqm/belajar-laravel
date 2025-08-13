<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function downloadPDF()
    {
        $user = Auth::user();

        $pdf = Pdf::loadView('pdf', compact('user'));
        return $pdf->download('profil_mahasiswa.pdf');
    }

    public function setings()
    {
        return view('setings', [
            'user' => Auth::user()
        ]);
    }

    public function index()
    {
        return view('profil', [
            'user' => Auth::user()
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        /**
         * @var \App\Models\User $user
         */

        $user = Auth::user();

        // Simpan file ke public/profile_picture
        $fileName = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('profile_picture'), $fileName);

        // Hapus foto lama kalau ada
        if ($user->profile_picture && file_exists(public_path('profile_picture/' . $user->profile_picture))) {
            unlink(public_path('profile_picture/' . $user->profile_picture));
        }

        // Update database
        $user->profile_picture = $fileName;
        $user->save();

        return back()->with('success', 'Foto profil berhasil diubah.');
    }

    // Fungsi untuk memperbarui password

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        /**
         * @var \App\Models\User $user
         */

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui');
    }
}

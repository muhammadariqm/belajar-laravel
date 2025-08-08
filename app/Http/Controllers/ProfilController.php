<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfilController extends Controller
{
    public function downloadPDF()
    {
        $user = Auth::user();

        $pdf = Pdf::loadView('pdf', compact('user'));
        return $pdf->download('profil_mahasiswa.pdf');
    }
}

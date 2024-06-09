<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserControllwe extends Controller
{
    // Fungsi untuk menampilkan form pendaftaran (boleh ubah variabelnya biar sama)
    public function showRegistrationForm()
    {
        return view('register');
}
    // Fungsi untuk mengirim form pendaftaran (boleh ubah variabelnya biar sama)
    public function register(Request $request)
    {
        
    }

    // Fungsi untuk menampilkan syarat dan ketentuan ((boleh ubah variabelnya biar sama)
    public function showTermsAndConditions()
    {
        return view('terms');
    }
}

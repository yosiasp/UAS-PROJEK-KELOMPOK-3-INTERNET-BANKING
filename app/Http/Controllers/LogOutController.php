<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    // fungsi untuk class yang hanya memiliki 1 fungsi yang dijalankan ketika user menekan tombol logout
    public function __invoke(Request $request)
    {
        // menghilangkan autentikasi yang diberikan ketika sudah login
        Auth::logout();
        // session dibuat tidak valid
        $request->session()->invalidate();
        // token dibuat kembali
        $request->session()->regenerateToken();
        
        // balik ke halaman main
        return redirect()->route('main');
    }
}

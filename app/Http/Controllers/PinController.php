<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PinController extends Controller
{
    public function changePin(Request $request)
    {
        // Validasi input
        $request->validate([
            'pinlama' => 'required',
            'pinbaru' => 'required|confirmed|min:6', // Minimal 6 karakter
        ]);

        $user = Auth::user();

        // Cek apakah PIN lama sesuai
        if (!Hash::check($request->pinlama, $user->pin)) {
            return back()->withErrors(['pinlama' => 'PIN lama tidak sesuai.']);
        }

        // Update PIN baru
        $user->pin = Hash::make($request->pinbaru);
        $user->save();

        return back()->with('status', 'PIN berhasil diubah.');
    }
}

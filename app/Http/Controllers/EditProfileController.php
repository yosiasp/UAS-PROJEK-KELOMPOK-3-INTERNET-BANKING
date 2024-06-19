<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function editProfilePage()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->nama_lengkap = $request->input('full_name');
        $user->tanggal_lahir = $request->input('birth_date');
        $user->jenis_kelamin = $request->input('gender');
        $user->alamat = $request->input('address');
        $user->save();

        return redirect()->route('editProfilePage')->with('success', 'Data diri berhasil diperbarui.');
    }
}

        

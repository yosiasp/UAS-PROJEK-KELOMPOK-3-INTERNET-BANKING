<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateAccountController extends Controller
{
    public function showCreateAccountForm()
    {
        return view('createAccount');
    }

    public function createAccount(Request $request)
    {
        // Proses validasi data yang diterima dari form
        $validatedData = $request->validate([
            'fullname' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'pin' => 'required',
            'confirm-pin' => 'required',
            'terms' => 'accepted',
        ]);

        // Proses pembuatan akun berdasarkan data yang diterima
        // Misalnya:
        // $newAccount = Account::create($validatedData);

        // Redirect atau tampilkan pesan sukses setelah berhasil membuat akun
    
    }
}
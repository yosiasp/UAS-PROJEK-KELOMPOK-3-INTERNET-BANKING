<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateAccount;

class CreateAccountController extends Controller
{
    public function index()
    {
        return view('createAccount');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'gender' => ['nullable', 'string', 'in:Laki-laki,Perempuan'], 
            'address' => ['required', 'string'],
            'phone' => ['required', 'integer'],
            'email' => ['required', 'string'],
            'username' => ['required', 'string'],
            'pin' => ['required', 'integer', 'min:6', 'max:6'],
        ]);
        
        Account::create([
            'fullname' => $request->fullname,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'username' => $request->username,
            'pin' => $request->pin,
        ]);

        return redirect()->route('home')->with('success', 'Akun berhasil dibuat.');
    }
}
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
            'fullname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'username' => 'required',
            'pin' => 'required',
        ]);
        
        $accounts = CreateAccount::create([
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
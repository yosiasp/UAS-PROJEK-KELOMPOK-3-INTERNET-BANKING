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
        
        $accounts = new CreateAccount;
        $accounts->fullname = $request->fullname;
        $accounts->dob = $request->dob;
        $accounts->gender = $request->gender;
        $accounts->address = $request->address;
        $accounts->phone = $request->phone;
        $accounts->email = $request->email;
        $accounts->username = $request->username;
        $accounts->pin = $request->pin;

        return redirect()->route('home')->with('success', 'Akun berhasil dibuat.');
    }
}
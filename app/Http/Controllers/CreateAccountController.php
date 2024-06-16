<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;   

class CreateAccountController extends Controller
{
    public function index()
    {
        return view('createAccount');
    }
    
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'], 
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', 'digits_between:10,15'],
            'email' => ['required', 'email', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:30'],
            'pin' => ['required', 'integer', 'min:6', 'max:6', 'confirmed'],
        ]);

        $accounts = new Account;
        $accounts->fullname = $request->fullname;
        $accounts->dob = $request->dob;
        $accounts->gender = $request->gender;
        $accounts->address = $request->address;
        $accounts->phone = $request->phone;
        $accounts->email = $request->email;
        $accounts->username = $request->username;
        $accounts->pin = $request->pin;
        $accounts->save();

        return redirect()->route('home')->with('success', 'Akun berhasil dibuat.');
    }
}

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

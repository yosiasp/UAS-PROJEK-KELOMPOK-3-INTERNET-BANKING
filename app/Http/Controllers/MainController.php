<?php

namespace App\Http\Controllers;


use App\Models\CreateAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() 
    {
        return view("main");
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

    $data = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    if(Auth::attempt($data)){
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("main");
    }

    public function login_proses(Request $request)
    {
        $username = $request->input('username');
        $pin = $request->input('pin');

        $account = Account::where('username', $username)->first();

        if ($account && $account->pin === $pin) {
            // Login successful
            return redirect()->route('home');
        } else {
            // Login failed, redirect back to login with error message
            return redirect()->route('main')->with('error', 'Username or PIN is incorrect.');
        }
    }
}
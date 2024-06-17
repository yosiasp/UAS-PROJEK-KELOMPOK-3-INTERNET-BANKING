<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
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

        if ($account && Hash::check($pin, $account->pin)) {
            // Login sukses
            return redirect()->route('home', ['id' => $account->id]);
        } else {
            // Login gagal, kembali ke main dengan error message
            return redirect()->route('main')->with('error', 'Username atau PIN salah.');
        }
    }
}
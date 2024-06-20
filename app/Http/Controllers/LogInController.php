<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\LoginHistory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $username = $request->input('username');
        $pin = $request->input('pin');

        $account = Account::where('username', $username)->first();

        if ($account && Hash::check($pin, $account->pin)) {
            // Login sukses
            $request->session()->regenerate();

            // Menyimpan login history
            $newLoginHistory = new LoginHistory;
            $newLoginHistory->username = $username;
            $newLoginHistory->datetime = now();
            $newLoginHistory->save();
        
            return redirect()->intended(route('home', ['id' => $account->id], absolute: true));
        } else {
            // Login gagal, kembali ke main dengan error message
            return redirect()->route('login')->with('error', 'Username atau PIN salah.');
        }
    }
}

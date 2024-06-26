<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\LoginHistory;
use App\Models\FailedAttempts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        if($account){
            $failedAttempts = FailedAttempts::where('username', $username)->first();

            if($failedAttempts->attempts == 3){
                return redirect()->route('login')->with('error', 'Akun anda telah terblokir, silahkan hubungi costumer service');
            }
    
            if (Hash::check($pin, $account->pin)) {
                // Login sukses
                $request->session()->regenerate();

                // Reset failed attempts
                $failedAttempts->attempts = 0;
                $failedAttempts->save();

                // Menyimpan login history
                $newLoginHistory = new LoginHistory;
                $newLoginHistory->username = $username;
                $newLoginHistory->datetime = Carbon::now()->setTimezone('Asia/Jakarta');
                $newLoginHistory->save();
        
                return redirect()->intended(route('home', ['id' => $account->id], absolute: true));
                
            } else {
                // Menambah failed attempts
                $failedAttempts->attempts++;
                $currentAttempts = $failedAttempts->attempts;
                $failedAttempts->save();

                // Login gagal, kembali ke main dengan error message
                if($currentAttempts == 3){
                    return redirect()->route('login')->with('error', 'Akun anda telah terblokir, silahkan hubungi customer service');
                } else {
                    $attemptsLeft = 3 - $currentAttempts;
                    return redirect()->route('login')->with('error', 'PIN anda salah, anda dapat mengulangi sebanyak '. $attemptsLeft . ' kali lagi.');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Username tidak ditemukan');
        }
    }
}

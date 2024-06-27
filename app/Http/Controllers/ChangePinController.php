<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\FailedAttempts;
use App\Models\Account;


class ChangePinController extends Controller
{
    public function index($id)
    {
        $account = Account::find($id);
        return view("changePin", compact('account'));
    }

    public function updatePin(Request $request, $id)
    {
        // Validasi 
        $validator = Validator::make($request->all(), [
            'pinLama' => 'required|string|size:6',
            'pinBaru' => 'required|string|size:6|confirmed',
        ]);
        
        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('changePin', ['id' => $id])->with('error', 'Ganti PIN gagal, pastikan PIN dan konfirmasi PIN sama');
        } else {
            $account = Account::find($id);

            if (Hash::check($request->pinLama, $account->pin)) {
                $account->setAttribute('pin', Hash::make($request->pinBaru));
                $account->save();
                return redirect()->route('changePin', ['id' => $id])->with('status', 'PIN berhasil diubah');   
            } else {
                $username = $account->username;
                $failedAttempts = FailedAttempts::where('username', $username)->first();

                // Memblokir akun
                $failedAttempts->attempts = 3;
                $failedAttempts->save();

                // Mencabut autentikasi
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
        
                return redirect()->route('main')->with('error', 'Akun anda telah terblokir, silahkan hubungi customer service');
            }
        }
    }
}

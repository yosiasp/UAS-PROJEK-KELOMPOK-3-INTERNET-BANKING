<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\FailedAttempts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ChangeEmailController extends Controller
{
    // menampilkan tampilan dari halaman untuk mengubah alamat email
    public function index($id)
    {
        $account = Account::find($id);
        return view('changeEmail', compact('account'));
    }

    public function updateEmail(Request $request, $id)
    {
        // Validasi 
        $validator = Validator::make($request->all(), [
            'emailLama' => 'required|email|string|max:255|',
            'emailBaru' => 'required|email|string|max:255|unique:accounts,email',
        ]);
        
        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('changeEmail', ['id' => $id])->with('error', 'Pengubahan email gagal, pastikan email baru belum pernah didaftarkan');
        } else {
            $account = Account::find($id);

            if($account && $account->email == $request->emailLama){
                $account->setAttribute('email', $request->emailBaru);
                $account->save();
                return redirect()->back()->with('success', 'Email berhasil diubah');
            } else{
                $username = $account->username;
                // return redirect()->back()->with('error', 'Email lama tidak sesuai');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;   
use App\Models\FailedAttempts;
use App\Models\Balance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAccountController extends Controller
{
    // menampilkan tampilan dari halaman register
    public function index()
    {
        return view('createAccount');
    }
    
    // membandingkan username dengan username yang ada di database
    public function checkUsername(Request $request)
    {
        $username = $request->query('username');
        $exists = Account::where('username', $username)->exists();

        return response()->json(['available' => !$exists]);
    }

    // menyimpan data ke dalam database sesuai validasi yang diberikan
    public function store(Request $request)
    {
        // Validasi 
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'dob' => 'required|date',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,15|unique:accounts,phone', 
            'email' => 'required|email|string|max:255|unique:accounts,email',
            'username' => 'required|string|min:6|max:21|unique:accounts',
            'pin' => 'required|string|size:6|confirmed', 
        ]);
        
        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('accounts')->with('error', 'Pembuatan akun gagal, pastikan nomor telepon dan email belom pernah didaftarkan serta PIN dan konfirmasi PIN sama');
        } else {
            $accounts = new Account;
            $accounts->fullname = $request->fullname;
            $accounts->dob = $request->dob;
            $accounts->gender = $request->gender;
            $accounts->address = $request->address;
            $accounts->phone = $request->phone;
            $accounts->email = $request->email;
            $accounts->username = $request->username;
            $accounts->pin = Hash::make($request->pin);
            $accounts->save();

            // Buat nomor rekening acak dengan panjang 13 digit
            $accountNumber = mt_rand(1000000000000, 9999999999999);

            $balances = new Balance;
            $balances->username = $request->username;
            $balances->accountNumber = $accountNumber;
            $balances->balance = 0;
            $balances->save();

            // menghitung jumlah kesalahan dalam memasukkan pin ketika username sudah sesuai
            $failedAttempts = new FailedAttempts;
            $failedAttempts->username = $request->username;
            $failedAttempts->attempts = 0;
            $failedAttempts->save();

            return redirect()->route('main')->with('success', 'Akun berhasil dibuat');
        }
    }
}

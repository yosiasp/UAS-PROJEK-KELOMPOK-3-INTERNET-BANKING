<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Balance;

class ChangePinController extends Controller
{
    public function index($id)
    {
        $account = Account::find($id);
        return view("changePin", compact('account'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pinLama' => 'required|string|size:6|',
            'pinBaru' => 'required|string|size:6|confirmed',
        ]);

        $pin = $request->input('pinBaru');
        $account = Account::find($id);

        if ($account && Hash::check($pin, $account->pin)) {
            // Pin lama benar
            $account->pin = Hash::make($request->pinbaru);
            $account->save();
            return redirect()->route('home')->with('status', 'PIN berhasil diubah.');
        } else {
            // Pin lama salah
            return redirect()->route('home')->with('error', 'PIN lama salah');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'pinLama' => 'required',
            'pinBaru' => 'required|digits:6|different:pinLama',
            'pinBaru_confirmation' => 'required|same:pinBaru',
        ]);

        $account = Account::find($id);

        if (!Hash::check($request->pinLama, $account->pin)) {
            return redirect()->back()->withErrors(['pinLama' => 'PIN lama tidak sesuai']);
        }

        $account->setAttribute('pin', Hash::make($request->pinBaru));
        $account->save();

        return redirect()->back()->with('success', 'PIN berhasil diubah');
    }
}

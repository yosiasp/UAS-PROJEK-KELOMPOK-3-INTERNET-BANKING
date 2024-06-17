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
            'pinlama' => 'required',
            'pinbaru' => 'required|confirmed|min:6|max:6',
        ]);

        $account = Account::find($id);
        $account->pin = Hash::make($request->pinbaru);
        $account->save();

        return redirect()->route('home')->with('status', 'PIN berhasil diubah.');
    }
}

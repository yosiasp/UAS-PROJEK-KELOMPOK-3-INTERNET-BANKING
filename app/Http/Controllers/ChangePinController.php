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
            'pinLama' => 'required|string|size:6',
            'pinBaru' => 'required|string|size:6|confirmed',
        ]);

        $account = Account::find($id);

        if (Hash::check($request->pinLama, $account->pin)) {
            $account->setAttribute('pin', Hash::make($request->pinBaru));
            $account->save();
            return redirect()->route('changePin', ['id' => $id])->with('status', 'PIN berhasil diubah');
            
        } else {
            return redirect()->route('changePin', ['id' => $id])->with('error', 'PIN lama tidak sesuai'); 
        }
    }
}

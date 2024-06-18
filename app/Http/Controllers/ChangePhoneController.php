<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class ChangePhoneController extends Controller
{
    public function index()
    {
        return view("changePhone", compact('account'));
    }

    public function updatePhone(Request $request, $id)
    {
        $request->validate([
            'phoneLama' => 'required',
            'phoneBaru' => 'required',
        ]);

        $account = Account::find($id);

        if ($account) {
            $account->setAttribute('phone', $request->phoneBaru);
            $account->save();

            return redirect()->back()->with('success', 'Nomor telepon berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Akun tidak ditemukan');
        }
    }
}

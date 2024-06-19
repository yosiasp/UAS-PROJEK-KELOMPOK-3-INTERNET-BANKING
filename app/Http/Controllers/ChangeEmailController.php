<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class ChangeEmailController extends Controller
{
    public function index($id)
    {
        $account = Account::find($id);
        return view('changeEmail', compact('account'));
    }

    public function updateEmail(Request $request, $id)
    {
        
        $request->validate([
            'emailLama' => 'required',
            'emailBaru' => 'required|email|unique:accounts,email',
        ]);

        $account = Account::find($id);

        if($account && $account->email == $request->emailLama){
            $account->setAttribute('email', $request->emailBaru);
            $account->save();
            return redirect()->back()->with('success', 'Email berhasil diubah');
        } else{
            return redirect()->back()->with('error', 'Email lama tidak sesuai');
        }
    }
}

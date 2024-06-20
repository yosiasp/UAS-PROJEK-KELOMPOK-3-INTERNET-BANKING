<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangeEmailController extends Controller
{
    public function index($id)
    {
        $account = Account::find($id);
        return view('changeEmail', compact('account'));
    }

    public function updateEmail(Request $request, $id)
    {
        // Validasi 
        $validator = Validator::make($request->all(), [
            'emailLama' => 'required|email',
            'emailBaru' => 'required|email|string|max:255|unique:accounts,email',
        ]);
        
        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('changeEmail', ['id' => $id])->with('error', 'Ganti email gagal, pastikan email valid dan belum digunakan pada akun lain');
        } else {
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
}

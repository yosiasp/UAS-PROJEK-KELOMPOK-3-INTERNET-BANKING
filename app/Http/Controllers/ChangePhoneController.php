<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;

class ChangePhoneController extends Controller
{
    public function index($id)
    {
        $account = Account::find($id);

        return view("changePhone", compact('account'));
    }

    public function updatePhone(Request $request, $id)
    {
        // Validasi 
        $validator = Validator::make($request->all(), [
            'phoneLama' => 'required|digits_between:10,15',
            'phoneBaru' => 'required|digits_between:10,15|unique:accounts,phone',
        ]);
        
        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('changePhone', ['id' => $id])->with('error', 'Pengubahan nomor telepon gagal, pastikan nomor telepon baru belum pernah didaftarkan');
        } else {
            $account = Account::find($id);

            if ($account && $account->phone == $request->phoneLama) {
                $account->setAttribute('phone', $request->phoneBaru);
                $account->save();

                return redirect()->back()->with('success', 'Nomor telepon berhasil diubah');
            } else {
                return redirect()->back()->with('error', 'Nomor telepon lama tidak sesuai');
            }    
        }


    }
}

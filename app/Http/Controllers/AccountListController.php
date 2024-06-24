<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Balance;
use App\Models\AccountList;
use Illuminate\Http\Request;

class AccountListController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);

        return view("accountList", compact('account'));
    }

    public function storeAccount(Request $request, $id)
    {
        $balanceInfo = Balance::where('accountNumber', $request->accountNumber)->first();

        if($balanceInfo){   
            $account = Account::find($id);
            $username = $account->username;

            $balanceInfoExists = AccountList::where('username', $username)
                                        ->where('accountNumber', $request->accountNumber)
                                        ->first();
            if($balanceInfoExists){
                return redirect()->route('accountList', ['id' => $id])->with('status', 'Nomor rekening sudah pernah ditambahkan');
            } else {
                $account2 = Account::where('username', $balanceInfo->username)->first();
                $fullname = $account2->fullname;

                $storedAccount = new AccountList;
                $storedAccount->username = $username;
                $storedAccount->accountNumber = $request->accountNumber;
                $storedAccount->fullname = $fullname;
                $storedAccount->save();

                return redirect()->route('accountList', ['id' => $id])->with('status', 'Nomor rekening '. $request->accountNumber .' '. $fullname.' ditambahkan');
            }
        } else {
            return redirect()->route('accountList', ['id' => $id])->with('error', 'Nomor rekening tidak ditemukan');
        }
    }
}
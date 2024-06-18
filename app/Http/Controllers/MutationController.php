<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Balance;
use App\Models\Mutation;
use Illuminate\Http\Request;

class MutationController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);

        $username = $account->username;
        $balanceInfo = Balance::where('username', $username)->first();

        $accountNumber = $balanceInfo->accountMutated;

        // Menampilkan hanya mutasi untuk nomor rekening terkait
        $personalMutations = Mutation::where('accountMutated', $accountNumber)->get();

        return view("mutation", compact('personalMutations', 'account'));
    }
}
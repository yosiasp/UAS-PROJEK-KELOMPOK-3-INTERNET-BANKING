<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);

        return view("transfer",  compact('account'));
    }
}
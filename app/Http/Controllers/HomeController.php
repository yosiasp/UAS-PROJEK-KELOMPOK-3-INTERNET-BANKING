<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);
        if (!$account) {
            abort(404);
        }

        return view('home', compact('account'));
    }
}
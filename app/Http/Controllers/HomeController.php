<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);
        if (!$account) {
            abort(404);
        }

        $currentDate = Carbon::now()->locale('id')->isoFormat('DD/MM/YYYY');
        $currentTime = Carbon::now()->isoFormat('HH:mm:ss');

        return view('home', compact('account', 'currentDate', 'currentTime'));
    }
}
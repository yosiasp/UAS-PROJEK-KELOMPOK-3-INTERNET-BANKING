<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);
        if (!$account) {
            abort(404);
        }
        $username = $account->username;

        $mostRecentLogin = LoginHistory::where('username', $username)
        ->orderBy('datetime', 'desc')
        ->skip(1)  
        ->take(1)  
        ->first();

        // Membuat format tanggal dan waktu
        if ($mostRecentLogin) {
        $mostRecentLogin->formatted_datetime = Carbon::parse($mostRecentLogin->datetime)
            ->format('DD/MM/YYYY HH:mm:ss');
        }

        return view('home', compact('account', 'mostRecentLogin'));
    }
}
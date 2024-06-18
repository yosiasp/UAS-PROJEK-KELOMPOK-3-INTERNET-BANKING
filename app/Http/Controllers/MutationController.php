<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Balance;
use App\Models\Mutation;
use Illuminate\Http\Request;

class MutationController extends Controller
{
    public function index(Request $request, $id) 
    {
        $account = Account::find($id);

        $username = $account->username;
        $balanceInfo = Balance::where('username', $username)->first();

        $accountNumber = $balanceInfo->accountNumber;

        // Request sorting dan filter dengan nilai defaultnya
        $sortOrder = $request->get('sort_order', 'asc'); 
        $filterType = $request->get('filter_type', 'all'); 

        // Menampilkan hanya mutasi untuk nomor rekening terkait
        $query = Mutation::where('accountMutated', $accountNumber);

        // Filtrasi tipe mutasi
        if ($filterType == 'in') {
            $query->where('type', 'uang masuk');
        } elseif ($filterType == 'out') {
            $query->where('type', 'uang keluar');
        }

        $personalMutations = $query->get();
        if ($sortOrder == 'desc') {
            $personalMutations = $personalMutations->reverse();
        } 
        
        return view('mutation', compact('personalMutations', 'account', 'sortOrder', 'filterType'));
    }
}
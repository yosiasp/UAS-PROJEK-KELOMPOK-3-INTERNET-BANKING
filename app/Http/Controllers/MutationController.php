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

        // Request sorting dan filter dengan nilai defaultnya masing-masing
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

        // Melakukan sorting berdasarkan waktu mutasi dibuat
        if ($sortOrder == 'desc') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'asc');
        }

        // Pagination dengan masing-masing page maksimal 10 mutasi
        $personalMutations = $query->paginate(10);
        
        return view('mutation', compact('personalMutations', 'account', 'sortOrder', 'filterType'));
    }
}
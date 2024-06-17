<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class MutationController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);

        // Memasukkan no rekening dari rekening yang mutasinya ingin ditampilkan
        $accountMutated = $request->input('accountMutated');

        // Menampilkan hanya mutasi untuk nomor rekening terkait
        $personalMutations = Mutation::where('accountMutated', $accountMutated)->get();

        return view("mutation", compact('personalMutations', 'account'));
    }
}
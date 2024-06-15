<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutationController extends Controller
{
    public function index() 
    {
        // Memasukkan no rekening dari rekening yang mutasinya ingin ditampilkan
        $accountMutated = $request->input('accountMutated');

        // Menampilkan hanya mutasi untuk nomor rekening terkait
        $personalMutations = Mutation::where('accountMutated', $accountMutated)->get();

        return view("mutation", compact('personalMutations'));
    }
}
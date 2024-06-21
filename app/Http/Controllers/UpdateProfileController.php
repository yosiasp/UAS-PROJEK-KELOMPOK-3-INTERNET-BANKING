<?php

namespace App\Http\Controllers;
use App\Models\Account;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{
    public function index($id)
    {
        $account = Account::find($id);

        return view("updateProfile",  compact('account'));
    }

    public function updateProfile(Request $request, $id)
    {
        // Validasi 
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'dob' => 'required|date',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'address' => 'required|string|max:255',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('updateProfile', ['id' => $id])->with('error', 'Pembaruan data diri gagal, pastikan data diri yang dimasukan valid valid');
        } else {
            $account = Account::find($id);

            if($account->fullname != $request->fullname){
                $account->fullname = $request->fullname;
            }
            
            if($account->dob != $request->dob){
                $account->dob = $request->dob;
            }

            if($account->fullname != $request->fullname){
                $account->fullname = $request->fullname;
            }
            
            if($account->gender != $request->gender){
                $account->gender = $request->gender;
            }

            if($account->address != $request->address){
                $account->address = $request->address;
            }

            if($account->address != $request->address){
                $account->address = $request->address;
            }
                 
            $account->save();
            
            return redirect()->route('updateProfile', ['id' => $id])->with('status', 'Pembaruan data diri berhasil');
        }

    }
}

        

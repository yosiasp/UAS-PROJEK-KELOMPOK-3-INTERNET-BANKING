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

            $changes = 0;

            if($account->fullname != $request->fullname){
                $account->fullname = $request->fullname;
                $changes++;
            }
            
            if($account->dob != $request->dob){
                $account->dob = $request->dob;
                $changes++;
            }

            if($account->fullname != $request->fullname){
                $account->fullname = $request->fullname;
                $changes++;
            }
            
            if($account->gender != $request->gender){
                $account->gender = $request->gender;
                $changes++;
            }

            if($account->address != $request->address){
                $account->address = $request->address;
                $changes++;
            }

            if($account->address != $request->address){
                $account->address = $request->address;
                $changes++;
            }
                 
            $account->save();
            
            if($changes == 0){
                return redirect()->route('updateProfile', ['id' => $id])->with('status', 'Tidak ada perubahan pada data diri');
            } else {
                return redirect()->route('updateProfile', ['id' => $id])->with('status', 'Pembaruan data diri berhasil');
            }
        }

    }
}

        

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EditEmailController extends Controller
{
    public function showChangeEmailForm()
    { 
        return view('change-email');
    }
    
    public function updateEmail(Request $request)
    {
         $request->validate([ 
            'old_email' => 'required|email',
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();

        if ($user->email !== $request->old_email) {
            return back()->withErrors(['old_email' => 'Old email is incorrect, please check your email']);
        }

        $user->email = $request->new_email;
        $user->save();

        return redirect()->route('home', ['id' => $user->id])->with('success', 'Email updated successfully');
    }
}
        

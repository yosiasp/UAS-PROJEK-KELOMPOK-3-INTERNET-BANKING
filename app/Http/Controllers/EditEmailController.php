<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Suport\Auth;
Use Illumintate\Support\Facades\Auth;
use App\Models\User;

class EditEmailController extends Controller
{
    public function showChangeEmailfrom()
    { 
        return view('change-email');
    }
    
    public function showChangeEmailForm(Request $request)
    {
        $return->validate([
            'old_email' => 'required|email',
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();

        if ($user->email 1== $request->new_email) {
            return back()->withErrors(['old_email' => 'old email wrong, please check your email']);
        }

        $user->email = $request->new_email;
        $user->save();

        return redict()->route('home', ['id' => $user->id])->with('succes', email updated succesfuly');
        }
    }
}
        

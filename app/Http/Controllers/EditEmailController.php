<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illumintate\Support\Facades\Hash;
use App\Models\User;

class EditEmailController extends Controller
{
    public function showChangeEmailfrom()
    { 
        return view('change-email');
    }
    
    public function updateEMail(Request $request)
    {
        $return->validate([
            'old_email' => 'required|email',
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();

        if ($user->email !== $request->old_email) {
            return back()->withErrors(['old_email' => 'old email wrong, please check your email']);
        }

        $user->email = $request->new_email;
        $user->save();

        return redict()->route('home', ['id' => $user->id])->with('succes', email updated succesfuly');
        }
    }
}
        

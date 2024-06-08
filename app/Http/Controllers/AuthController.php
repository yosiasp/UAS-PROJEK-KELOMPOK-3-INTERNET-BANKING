<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createAccount()
    {
        validator(request()->all(), [
            'fullname' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'gender' => ['nullable'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'username' => ['required', 'string'],
            'pin' => ['required', 'integer', 'min_digits:6', 'max_digits:6'],
            'confirm-pin' => ['required', 'integer', 'min_digits:6', 'max_digits:6']
        ])->validate();
    }
}

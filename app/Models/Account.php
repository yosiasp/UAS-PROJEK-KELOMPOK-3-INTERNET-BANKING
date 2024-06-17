<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'dob',
        'gender',
        'address',
        'phone',
        'email',
        'username',
        'pin',
    ];

    protected $table = 'accounts';
}

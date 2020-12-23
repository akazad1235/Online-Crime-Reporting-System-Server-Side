<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nid',
        'gender',
        'birth_day',
        'address',
        'image',
        'status',
        'acc_active',
        'varification_code',
        'password'
    ];
}

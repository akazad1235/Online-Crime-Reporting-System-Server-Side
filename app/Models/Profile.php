<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'station_id',
        'phone_number',
        'employee_id',
        'birth_day',
        'designation',
        'desc',
        'profile_image'
    ];
}

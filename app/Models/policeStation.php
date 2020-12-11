<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class policeStation extends Model
{
    use HasFactory;


    protected $fillable = [
        'district_id',
        'policeStationName',
        'email',
        'stationCode',
        'district',
        'address'
    ];
}

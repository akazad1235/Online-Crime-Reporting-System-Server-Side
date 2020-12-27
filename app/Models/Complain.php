<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $fillable = [
        'reg_id',
        'station_id',
        'complain_name',
        'complain_type',
        'desc',
        'place',
        'image',
        'video',
        'file',
        'comp_status',
        'created_at',
    ];
}

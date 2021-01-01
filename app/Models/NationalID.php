<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalID extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'father_name','mother_name', 'birth_day', 'blood_group', 'zip_Code', 'NID_No', 'address', 'image'];
}

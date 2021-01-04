<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable=['user_id','criminal_id', 'blog_id', 'comment', 'comment_type', 'replay', 'like'];
}

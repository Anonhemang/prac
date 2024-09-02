<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPost extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['image', 'title', 'content', 'category',];

    protected $casts = ['category'=>'array'];
}

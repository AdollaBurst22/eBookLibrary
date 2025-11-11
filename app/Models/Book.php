<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'cover',
        'description',
        'file',
        'published_year',
        'author_name',
        'category_id',
    ];
}

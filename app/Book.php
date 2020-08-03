<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['imagePath', 'title', 'author', 'publishedYear', 'category', 'description', 'price'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'bookstore';
    protected $fillable = ['title', 'author', 'isbn', 'publisher', 'publication_year'];
}

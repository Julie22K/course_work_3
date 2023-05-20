<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;
    public function book()//many-to-one
    {
        return $this->belongsTo(Book::class);
    }
    public function author()//many-to-one
    {
        return $this->belongsTo(Author::class);
    }
}

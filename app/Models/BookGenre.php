<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    use HasFactory;
    public function book()//many-to-one
    {
        return $this->belongsTo(Book::class);
    }
    public function genre()//many-to-one
    {
        return $this->belongsTo(Genre::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $guarded = array();
    public function book_author()//one-to-many
    {
        return $this->hasMany(BookAuthor::class ,'author_id','id');
    }
}

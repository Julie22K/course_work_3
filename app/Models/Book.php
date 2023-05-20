<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded='books';
    public function book_author()//one-to-many
    {
        return $this->hasMany(BookAuthor::class ,'book_id','id');
    }
    public function book_genre()//one-to-many
    {
        return $this->hasMany(BookGenre::class ,'book_id','id');
    }
    public function inventory_book()//one-to-many
    {
        return $this->hasMany(InventoryBook::class ,'book_id','id');
    }

}

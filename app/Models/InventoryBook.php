<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryBook extends Model
{
    use HasFactory;
    public function book()//many-to-one
    {
        return $this->belongsTo(Book::class);
    }
    public function shop()//many-to-one
    {
        return $this->belongsTo(Shop::class);
    }
    public function sold_books()//one-to-many
    {
        return $this->hasMany(SoldBook::class ,'inventory_book_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;
    public function book()
    {
        return $this->hasMany(Book::class ,'edition_id','id');
    }
}

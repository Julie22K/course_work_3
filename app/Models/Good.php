<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    public function sale()
    {
        return $this->hasMany(Sale::class ,'good_id','id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

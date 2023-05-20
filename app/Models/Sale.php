<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function shop()//many-to-one
    {
        return $this->belongsTo(Shop::class);
    }
    public function employer()//many-to-one
    {
        return $this->belongsTo(Employer::class);
    }
    public function consumer()//many-to-one
    {
        return $this->belongsTo(Consumer::class);
    }
    public function items()//one-to-many
    {
        return $this->hasMany(SoldBook::class ,'sale_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldBook extends Model
{
    use HasFactory;
    public function sale()//many-to-one
    {
        return $this->belongsTo(Sale::class);//todo check
    }
    public function inventory_book()//many-to-one
    {
        return $this->belongsTo(InventoryBook::class);//todo check
    }
}

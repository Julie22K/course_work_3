<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    use HasFactory;
    public function sale()//one-to-many
    {
        return $this->hasMany(Sale::class ,'consumer_id','id');
    }
}

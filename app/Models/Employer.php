<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table='employee';
    public function sale()//one-to-many
    {
        return $this->hasMany(Sale::class ,'employer_id','id');
    }
    public function shop()//many-to-one
    {
        return $this->belongsTo(Shop::class);
    }

}

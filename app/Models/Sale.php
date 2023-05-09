<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function good()
    {
        return $this->belongsTo(Good::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}

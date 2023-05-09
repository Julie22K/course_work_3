<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded='books';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function good()
    {
        return $this->hasMany(Good::class ,'good_id','id');
    }
}

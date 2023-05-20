<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{//todo Добрий день! 30.05 о 9:00 - захист курсових ОЧНО. До цього часу сконтактуйте з керівниками, перевірте свою роботу в юнічеці. Більше можливості не буде, інші - на перездачу.

    use HasFactory;

    public function inventory_book()//one-to-many
    {
        return $this->hasMany(InventoryBook::class ,'shop_id','id');
    }
    public function sale()//one-to-many
    {
        return $this->hasMany(Sale::class ,'shop_id','id');
    }
    public function employer()//one-to-many
    {
        return $this->hasMany(Employer::class ,'shop_id','id');
    }
}

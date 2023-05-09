<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Good>
 */
class GoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $book_id=Book::all()->random()->id;
        $book=Book::find($book_id);
        $price=$book->purchase_price+($book->purchase_price/2);
        return [
            'shop_id'=>Shop::all()->random()->id,
            //'number'=>$this->faker->numberBetween(1,100),
            'book_id'=>$book_id,
            'sale_price'=>$price,
        ];
    }
}

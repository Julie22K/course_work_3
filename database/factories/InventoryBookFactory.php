<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryBook>
 */
class InventoryBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'shop_id'=>Shop::all()->random()->id,
        'book_id'=>Book::all()->random()->id,
        'order_date'=>$this->faker->dateTimeThisYear(),
        'order_price'=>$this->faker->numberBetween(50,1000)
        ];
    }
}

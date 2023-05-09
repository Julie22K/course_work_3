<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Edition;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(1),
            'image'=>$this->faker->imageUrl(),
            'purchase_price'=>$this->faker->numberBetween(0,1000),
            'description'=>$this->faker->paragraph(1),
            'category_id'=>Category::all()->random()->id,
            'author_id'=>Author::all()->random()->id,
            'edition_id'=>Edition::all()->random()->id,

            'genre_id'=>Genre::all()->random()->id

        ];
    }
}

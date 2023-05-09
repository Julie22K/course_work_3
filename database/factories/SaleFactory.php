<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Good;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'good_id'=>Good::all()->random()->id,
            'client_id'=>Client::all()->random()->id,
            'date'=>$this->faker->dateTime
        ];
    }
}

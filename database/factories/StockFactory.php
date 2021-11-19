<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'price' => $this->faker->randomFloat(null, 104, 946.8),
            'sell_rate' => mt_rand(1, 67),
            'rate_change_percent' => mt_rand(2, 98),
        ];
    }
}

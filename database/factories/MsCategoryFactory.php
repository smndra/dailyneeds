<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MsCategory>
 */
class MsCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
        {
            return [
                'category_name' => $this->faker->unique()->randomElement(['Food', 'Beverages', 'Household Supplies', 'Daily Needs', 'Cleaning Products', 'Stationery']),
            ];
        }
}
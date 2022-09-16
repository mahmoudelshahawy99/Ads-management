<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'type' => fake()->randomElement(['free', 'paid']),
            'title' => fake()->title(),
            'description' => fake()->paragraph(25),
            'category_id' => fake()->numberBetween(1, 30),
            'advertiser_id' => fake()->numberBetween(1, 30),
            'start_date' => fake()->dateTimeBetween('+1 days', '+6 months')
        ];
    }
}

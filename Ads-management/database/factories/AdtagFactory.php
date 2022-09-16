<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adtag>
 */
class AdtagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ad_id' => fake()->numberBetween(1, 30),
            'tag_id' => fake()->numberBetween(1, 30),
        ];
    }
}

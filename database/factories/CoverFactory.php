<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cover>
 */
class CoverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(2),
            'slug' => fake()->slug(),
            'media' => fake()->sentence(3),
            'dimensions' => fake()->randomDigitNotZero().'0 x '.fake()->randomDigitNotZero().'0 cm',
            'work_date' => fake()->dateTimeBetween('-15 years', 'now'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Work::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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

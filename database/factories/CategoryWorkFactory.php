<?php

namespace Database\Factories;

use App\Models\CategoryWork;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryWorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryWork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => fake()->numberBetween(1, 6),
            'work_id' =>   fake()->numberBetween(1, 11),
            'order' =>  fake()->randomDigitNotZero(),
        ];
    }
}

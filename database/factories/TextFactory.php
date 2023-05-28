<?php

namespace Database\Factories;

use App\Models\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

class TextFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Text::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(3),
            'body' => fake()->paragraph(10),
            'author' => fake()->name(),
            'year' => fake()->year(),
            'description' => fake()->paragraph(1),
            'publication' => fake()->sentence(3),
            'publication_date' => fake()->date('Y-m-d', 'now')
        ];
    }
}

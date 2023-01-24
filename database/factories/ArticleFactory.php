<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'header' => fake()->title(),
            'userid' => 1,
            'username' => fake()->name(),
            'description' => 'short text',
            'body' => fake()->text(),
            'url' => fake()->unique()->randomDigit()
            //
        ];
    }
}

<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Objavleniya>
 */
class ObjavleniyaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'obj_name' => fake()->title(),
            'obj_desc' => fake()->title(),
            'author_id' => 1,
            'url' => fake()->unique()->randomDigit(),
            'longdescription' => fake()->text(),
            'preimushestvo1' => 'рандомное преимущество 1',
            'preimushestvo2' => 'рандомное преимущество 2',
            'preimushestvo3' => 'рандомное преимущество 3',
            'address' => 'рандомный адрес',
            'phone' => '8 888 8888 888',
            'maps' => fake()->title(),
        ];
    }
}


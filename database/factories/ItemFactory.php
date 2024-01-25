<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $counter = 1;
    public function definition(): array
    {
        return [
            'name' => 'Vegetable ' . static::$counter++, 
            'description' => $this->faker->text('100'), 
            'price' => $this->faker->numberBetween(100000, 500000)
        ];
    }
}

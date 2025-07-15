<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price' => $this->faker->numberBetween(100, 5000),
            'discount' => $this->faker->numberBetween(0, 100),
            'details' => $this->faker->text,
            'enabled' => $this->faker->boolean,
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}

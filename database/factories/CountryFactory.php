<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'iso_code' => $this->faker->countryCode,
            'currency_code' => $this->faker->currencyCode,
            'currency_symbol' => $this->faker->randomElement(['$', '€', '£', '¥', '₹', '₩', '₽', '₺']),
            'usd_value' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
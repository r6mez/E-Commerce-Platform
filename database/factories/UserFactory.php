<?php

namespace Database\Factories;

<<<<<<< HEAD
=======
use App\Models\Country;
>>>>>>> 7094211 (create login and sign up pages)
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
<<<<<<< HEAD
     * The current password being used by the factory.
=======
     * The current password being used by the factory._email
>>>>>>> 7094211 (create login and sign up pages)
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
=======
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'type' => $this->faker->randomElement(['user', 'seller', 'admin']),
            'country_id' => Country::all()->random()->id,
>>>>>>> 7094211 (create login and sign up pages)
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 7094211 (create login and sign up pages)

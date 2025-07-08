<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
=======
        $this->call([
            CountrySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            PhotoSeeder::class,
            OrdersSeeder::class,
        ]);
    }
}
>>>>>>> 7094211 (create login and sign up pages)

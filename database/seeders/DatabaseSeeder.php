<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->count(10)
            ->create();

        $this->call([
            CategoryNameSeeder::class,
            DurationSeeder::class,
        ]);

        Level::factory()
            ->count(4)
            ->create();

        Recipe::factory()
            ->count(1000)
            ->create();

    }
}

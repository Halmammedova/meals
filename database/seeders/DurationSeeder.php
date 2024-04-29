<?php

namespace Database\Seeders;

use App\Models\Duration;
use Illuminate\Database\Seeder;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(15,130) as $obj) {
            Duration::create([
                'name' => $obj,
            ]);
        }
    }
}

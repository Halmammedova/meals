<?php

namespace Database\Factories;

use App\Models\CategoryName;
use App\Models\Duration;
use App\Models\Level;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $categoryName = CategoryName::with('category')->inRandomOrder()->first();
        $duration = Duration::inRandomOrder()->first();
        $level = Level::inRandomOrder()->first();
        $createdAt = fake()->dateTimeBetween('-6 months', 'now');
        return [
            'user_id' => $user->id,
            'category_id' => $categoryName->category_id,
            'category_name_id' => $categoryName->id,
            'duration_id' => $duration->id,
            'level_id' => $level->id,
            'title' => $categoryName->name,
            'body' => fake()->paragraph(rand(3, 5)),
            'kcal' => fake()->numberBetween(200, 800),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(rand(0, 6))->addHours(rand(0, 23))->addMinutes(rand(0, 59)),
        ];
    }
}

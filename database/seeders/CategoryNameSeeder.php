<?php

namespace Database\Seeders;

use App\Models\CategoryName;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Breakfast', 'names' => [
                'Toast', 'Pancake', 'Sandwich', 'Porridge', 'Omelleta', 'Oatmeal', 'Waffle', 'Crepes',
            ]],
            ['name' => 'Brunch', 'names' => [
                'Toast', 'Pancake', 'Sandwich', 'Porridge', 'Omelleta', 'Oatmeal', 'Waffle', 'Muffin', 'Crepes',
            ]],
            ['name' => 'Lunch', 'names' => [
                'Salad', 'Sandwich', 'Soup', 'Noodles', 'Pizza',
            ]],
            ['name' => 'Snack', 'names' => [
                'Pudding', 'Yoghurt', 'Crackers', 'Chips',
            ]],
            ['name' => 'Dinner', 'names' => [
                'Soup', 'Salad', 'Salmon', 'Ginger Chicken udon noodles', 'Sardine tomato pasta with gremolata', 'Burgers', 'Steak', 'Tuna', 'Spaghetti', 'Pizza', 'Nachos', 
            ]],
        ];

        foreach ($objs as $obj) {
            $category = Category::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['names'] as $name) {
                CategoryName::create([
                    'category_id' => $category->id,
                    'name' => $name,
                ]);
            }
        }
    }
}

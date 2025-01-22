<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Rock',
                'description' => 'Classic and modern rock albums',
            ],
            [
                'name' => 'Jazz',
                'description' => 'Jazz classics and contemporary releases',
            ],
            [
                'name' => 'Classical',
                'description' => 'Classical music masterpieces',
            ],
            [
                'name' => 'Pop',
                'description' => 'Popular music from various decades',
            ],
            [
                'name' => 'Electronic',
                'description' => 'Electronic and dance music',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}

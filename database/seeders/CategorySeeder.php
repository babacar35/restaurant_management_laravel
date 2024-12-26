<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Entrées',
                'slug' => 'entrees',
                'description' => 'Nos entrées fraîches et savoureuses',
                'is_active' => true
            ],
            [
                'name' => 'Plats principaux',
                'slug' => 'plats-principaux',
                'description' => 'Nos plats signatures',
                'is_active' => true
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts',
                'description' => 'Nos délicieux desserts',
                'is_active' => true
            ],
            [
                'name' => 'Boissons',
                'slug' => 'boissons',
                'description' => 'Notre sélection de boissons',
                'is_active' => true
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 
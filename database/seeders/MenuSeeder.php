<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Salade César',
                'slug' => 'salade-cesar',
                'description' => 'Laitue romaine, croûtons, parmesan, sauce césar maison',
                'price' => 12.50,
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Carpaccio de Bœuf',
                'slug' => 'carpaccio-de-boeuf',
                'description' => 'Fines tranches de bœuf, copeaux de parmesan, roquette, huile d\'olive',
                'price' => 14.90,
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Steak Frites',
                'slug' => 'steak-frites',
                'description' => 'Steak de bœuf, frites maison, sauce au poivre',
                'price' => 24.90,
                'category_id' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Saumon Grillé',
                'slug' => 'saumon-grille',
                'description' => 'Pavé de saumon, légumes de saison, sauce hollandaise',
                'price' => 22.50,
                'category_id' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Tiramisu',
                'slug' => 'tiramisu',
                'description' => 'Tiramisu traditionnel au café et mascarpone',
                'price' => 8.50,
                'category_id' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Crème Brûlée',
                'slug' => 'creme-brulee',
                'description' => 'Crème brûlée à la vanille de Madagascar',
                'price' => 7.90,
                'category_id' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
} 
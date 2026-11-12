<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::insert([
            [
                'name' => 'Nasi Ayam Geprek',
                'price' => 15000,
                'stock' => 20,
                'description' => 'Ayam crispy dengan sambal bawang pedas nikmat',
                'image' => 'images/geprek.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kentang Goreng',
                'price' => 10000,
                'stock' => 15,
                'description' => 'Kentang goreng renyah dengan taburan bumbu gurih',
                'image' => 'images/fries.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Thai Tea',
                'price' => 8000,
                'stock' => 25,
                'description' => 'Teh khas Thailand manis dan creamy',
                'image' => 'images/thai.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            ['Ayam Geprek',     'Makanan', 10000, 20, true,  'Ayam goreng crispy digeprek dengan sambal cabai gurih.', 'images/Geprek.png'],
            ['Mie Goreng',      'Makanan', 10000, 18, true,  'Mie goreng instan favorit disajikan lengkap dengan sayuran & bumbu rahasia.', 'images/Migor.png'],
            ['Kentang Goreng',  'Cemilan', 10000, 15, false, 'Kentang goreng renyah dipadu bumbu gurih khas kantin.', 'images/Fries.png'],
            ['Dimsum',          'Cemilan',  7000, 25, false, 'Dimsum lembut isi daging olahan disajikan dengan saus pedas manis.', 'images/Dimsum.png'],
            ['Thai Tea',        'Minuman',  8000, 25, false, 'Minuman teh khas Thailand manis dan segar dengan susu kental manis.', 'images/Thai.png'],
            ['Teh Es',          'Minuman',  5000, 30, false, 'Es teh manis segar pelepas dahaga saat istirahat.', 'images/Teh.png'],
            ['Air Tahu',        'Minuman',  5000, 12, false, 'Susu kedelai / air tahu murni hangat/dingin yang sehat.', 'images/Tahu.png'],
        ];

        foreach ($menus as [$name, $category, $price, $stock, $spicy, $desc, $image]) {
            Menu::updateOrCreate(
                ['name' => $name],
                [
                    'category'    => $category,
                    'price'       => $price,
                    'stock'       => $stock,
                    'is_spicy'    => $spicy,
                    'description' => $desc,
                    'image'       => $image,
                ]
            );
        }
    }
}
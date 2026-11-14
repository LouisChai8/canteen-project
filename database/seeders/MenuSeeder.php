<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            // Makanan Berat
            ['Nasi Ayam Geprek', 'Makanan', 12000, 'Ayam crispy gurih digeprek dengan sambal cabai segar khas kantin.', 'images/Geprek.png'],
            ['Nasi Goreng Spesial', 'Makanan', 13000, 'Nasi goreng aromatik dengan potongan bakso, sosis, dan telur mata sapi.', 'images/Nasgor.png'],
            ['Mie Goreng Kantin', 'Makanan', 10000, 'Mie goreng instan favorit disajikan lengkap dengan sayuran hijau dan telur.', 'images/Migor.png'],
            ['Nasi Katsu Ayam', 'Makanan', 15000, 'Chicken katsu renyah disiram saus asam manis gurih di atas nasi hangat.', 'images/Katsu.png'],
            ['Nasi Telur Dadar Crispy', 'Makanan', 9000, 'Telur dadar tebal digoreng kriuk disiram kuah kecap gurih dan nasi.', 'images/NasiTelur.png'],
            ['Mie Rebus Telur Kornet', 'Makanan', 11000, 'Mie rebus kuah hangat gurih dengan topping telur dan kornet sapi.', 'images/MieRebus.png'],
            ['Kwetiau Goreng Sapi', 'Makanan', 14000, 'Kwetiau kenyal digoreng kecap manis gurih dengan potongan daging dan telur.', 'images/Kwetiau.png'],

            // Cemilan
            ['Kentang Goreng', 'Cemilan', 10000, 'Kentang goreng renyah tabur bumbu balado/keju gurih.', 'images/Fries.png'],
            ['Dimsum Ayam', 'Cemilan', 8000, 'Dimsum lembut isi daging ayam olahan disajikan dengan saus pedas manis.', 'images/Dimsum.png'],
            ['Roti Bakar Cokelat', 'Cemilan', 7000, 'Roti tawar panggang dengan lumeran mentega dan selai cokelat tebal.', 'images/RotiBakar.png'],
            ['Batagor Kuah/Kering', 'Cemilan', 9000, 'Baso tahu goreng gurih renyah disiram bumbu kacang kental khas.', 'images/Batagor.png'],
            ['Pisang Goreng Keju', 'Cemilan', 8000, 'Pisang manis digoreng tepung renyah bertabur keju parut melimpah.', 'images/Pisang.png'],
            ['Cireng Bumbu Rujak', 'Cemilan', 7000, 'Aci digoreng kenyal di luar lembut di dalam, pas dicocol bumbu rujak pedas.', 'images/Cireng.png'],
            ['Sosis Bakar Jumbo', 'Cemilan', 8000, 'Sosis panggang berukuran besar dioles saus Barbecue gurih pedas.', 'images/Sosis.png'],

            // Minuman
            ['Es Thai Tea', 'Minuman', 8000, 'Teh khas Thailand manis dan creamy pelepas dahaga.', 'images/Thai.png'],
            ['Es Matcha Latte', 'Minuman', 9000, 'Minuman serbuk matcha pekat khas berpadu susu segar dan es.', 'images/Matcha.png'],
            ['Es Jeruk Peras', 'Minuman', 5000, 'Perasan buah jeruk segar kaya vitamin C dengan es batu.', 'images/Esjeruk.png'],
            ['Teh Es Manis', 'Minuman', 4000, 'Teh melati manis segar legendaris anak sekolah.', 'images/Teh.png'],
            ['Es Cokelat Susu', 'Minuman', 8000, 'Susu cokelat dingin yang creamy, manisnya pas di lidah.', 'images/Cokelat.png'],
            ['Es Lemon Tea', 'Minuman', 6000, 'Teh segar dipadu perasan lemon Asli yang asam manis menyegarkan.', 'images/Lemon.png'],
            ['Es Kopi Susu Gula Aren', 'Minuman', 10000, 'Kopi espresso lokal berpadu susu segar dan manisnya gula aren.', 'images/Kopsu.png'],
            ['Es Cappuccino Cincau', 'Minuman', 7000, 'Cappuccino blend dingin dengan serutan cincau hitam lembut.', 'images/Cappucino.png'],
        ];

        foreach ($menus as [$name, $category, $price, $desc, $image]) {
            Menu::updateOrCreate(
                ['name' => $name],
                [
                    'category'    => $category,
                    'price'       => $price,
                    'description' => $desc,
                    'image'       => $image,
                ]
            );
        }
    }
}
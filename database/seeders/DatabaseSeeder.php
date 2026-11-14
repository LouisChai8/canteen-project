<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Tetap (Lynelle)
        User::updateOrCreate(
            ['email' => 'jolene@admin.com'],
            [
                'name' => 'Lynelle',
                'password' => Hash::make('prettyjolene'),
                'role' => 'admin',
            ]
        );

        // 2. Akun User Tetap (Jolene)
        User::updateOrCreate(
            ['email' => 'jolene@user.com'],
            [
                'name' => 'Jolene',
                'password' => Hash::make('prettyjolene'),
                'role' => 'user',
            ]
        );

        // 3. Panggil seeder menu kantin
        $this->call([
            MenuSeeder::class,
        ]);
    }
}
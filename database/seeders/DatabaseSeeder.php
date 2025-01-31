<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Category::create([
            'nama_kategori' => 'PP Putra Putri',  // Digabungkan menjadi satu kategori
            'kuota_wira' => 30,  // Kuota total Wira untuk Putra + Putri
            'kuota_madya' => 35,  // Kuota total Madya untuk Putra + Putri
        ]);

        Category::create([
            'nama_kategori' => 'Kabaret',
            'kuota_wira' => 14,
            'kuota_madya' => 17,
        ]);

        Category::create([
            'nama_kategori' => 'Tandu Putra Putri',  // Digabungkan menjadi satu kategori
            'kuota_wira' => 50,  // Kuota total Wira untuk Putra + Putri
            'kuota_madya' => 56,  // Kuota total Madya untuk Putra + Putri
        ]);

        Category::create([
            'nama_kategori' => 'Konselor',
            'kuota_wira' => 28,
            'kuota_madya' => 26,
        ]);

        Category::create([
            'nama_kategori' => 'Dapur Umum',
            'kuota_wira' => 25,
            'kuota_madya' => 25,
        ]);

        Category::create([
            'nama_kategori' => 'Karikatur',
            'kuota_wira' => 24,
            'kuota_madya' => 26,
        ]);
    }
}

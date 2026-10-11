<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Panggil model Category

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Masukkan data kategori awal di sini
        Category::create(['name' => 'Peralatan Dapur']);
        Category::create(['name' => 'Alat Tulis Kantor (ATK)']);
        Category::create(['name' => 'Elektronik']);
        Category::create(['name' => 'Perabotan Rumah Tangga']);
        Category::create(['name' => 'Fashion']);
    }
}
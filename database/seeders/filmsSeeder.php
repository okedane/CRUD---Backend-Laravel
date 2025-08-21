<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class filmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Film::create([
            'title' => 'Film A',
            'description' => 'Deskripsi Film A',
            'image' => 'film-a.jpg',
            'kategori_id' => 1
        ]);

        \App\Models\Film::create([
            'title' => 'Film B',
            'description' => 'Deskripsi Film B',
            'image' => 'film-b.jpg',
            'kategori_id' => 2
        ]);

        \App\Models\Film::create([
            'title' => 'Film C',
            'description' => 'Deskripsi Film C',
            'image' => 'film-c.jpg',
            'kategori_id' => 3
        ]);
    }
}

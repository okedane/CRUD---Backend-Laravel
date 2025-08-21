<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('profiles')->insert([
            'user_id' => 1,
            'username' => 'john_doe',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'date_of_birth' => '1990-01-01',
            'profile_picture' => 'path/to/profile_picture.jpg',
            'bio' => 'Lorem ipsum dolor sit amet.',
            'facebook' => 'https://facebook.com/john_doe',
            'twitter' => 'https://twitter.com/john_doe',
            'instagram' => 'https://instagram.com/john_doe',
            'linkedin' => 'https://linkedin.com/in/john_doe',
            'website' => 'https://johndoe.com',
        ]);
    }
}

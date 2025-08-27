<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'okeedan',
            'email' => 'dani@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}

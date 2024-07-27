<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'full_name' => 'John Doe',
            'email' => 'john.doe@email.com',
            'password' => Hash::make('qwerty123'),
            'type' => 1,
            'created_at' => '2024-07-01 00:00:00'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Alex Kirkman',
            'email' => 'alex.kirkman@email.com',
            'password' => Hash::make('qwerty123'),
            'type' => 2,
            'created_at' => '2024-07-01 10:00:00',
            'created_by' => 1
        ]);
        DB::table('users')->insert([
            'full_name' => 'Chuck Russink',
            'email' => 'chuck.russink@email.com',
            'password' => Hash::make('qwerty123'),
            'type' => 2,
            'created_at' => '2024-07-01 12:00:00',
            'created_by' => 1
        ]);
        DB::table('users')->insert([
            'full_name' => 'Kendra Daynes',
            'email' => 'kendra.daynes@email.com',
            'password' => Hash::make('qwerty123'),
            'type' => 2,
            'created_at' => '2024-07-01 15:00:00',
            'created_by' => 1
        ]);
    }
}

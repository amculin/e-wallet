<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registration')->insert([
            'full_name' => 'Tom Kirkman',
            'email' => 'tom.kirkman@email.com',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('registration')->insert([
            'full_name' => 'Aaron Shore',
            'email' => 'aaron.shore@email.com',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('registration')->insert([
            'full_name' => 'Emily Rhodes',
            'email' => 'emily.rhodes@email.com',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('registration')->insert([
            'full_name' => 'Seth Wright',
            'email' => 'seth.wright@email.com',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('registration')->insert([
            'full_name' => 'Hannah Wells',
            'email' => 'hannah.wells@email.com',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('registration')->insert([
            'full_name' => 'Mike Ritter',
            'email' => 'mike.ritter@email.com',
            'password' => Hash::make('qwerty123'),
        ]);
    }
}

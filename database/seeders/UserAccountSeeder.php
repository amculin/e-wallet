<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_account')->insert([
            'user_id' => 2,
            'bank_id' => 2,
            'account_number' => '02237649920',
            'created_at' => '2024-07-01 10:05:00',
            'created_by' => 1
        ]);
        DB::table('user_account')->insert([
            'user_id' => 3,
            'bank_id' => 3,
            'account_number' => '8982202000012',
            'created_at' => '2024-07-01 12:05:00',
            'created_by' => 1
        ]);
        DB::table('user_account')->insert([
            'user_id' => 4,
            'bank_id' => 6,
            'account_number' => '002718101',
            'created_at' => '2024-07-01 15:05:00',
            'created_by' => 1
        ]);
        DB::table('user_account')->insert([
            'user_id' => 2,
            'bank_id' => 1,
            'account_number' => '544010104410',
            'created_at' => '2024-07-07 16:07:00',
            'created_by' => 1
        ]);
        DB::table('user_account')->insert([
            'user_id' => 4,
            'bank_id' => 5,
            'account_number' => '0009112736',
            'created_at' => '2024-07-01 18:39:00',
            'created_by' => 1
        ]);
    }
}

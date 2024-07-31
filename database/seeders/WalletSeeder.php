<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wallet')->insert([
            'user_id' => 2,
            'balance' => 182100.00,
            'created_at' => '2024-07-01 10:00:00',
            'updated_at' => '2024-07-04 12:48:31',
            'created_by' => 1,
            'updated_by' => 2
        ]);
        DB::table('wallet')->insert([
            'user_id' => 3,
            'balance' => 357958.00,
            'created_at' => '2024-07-01 12:00:00',
            'updated_at' => '2024-07-01 14:39:20',
            'created_by' => 1,
            'updated_by' => 3
        ]);
        DB::table('wallet')->insert([
            'user_id' => 4,
            'balance' => 0.00,
            'created_at' => '2024-07-01 15:00:00',
            'created_by' => 1
        ]);
    }
}

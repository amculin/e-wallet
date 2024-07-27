<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ref_bank')->insert([
            'code' => 'BCA',
            'name' => 'Bank Central Asia',
        ]);
        DB::table('ref_bank')->insert([
            'code' => 'BNI',
            'name' => 'Bank Negara Indonesia',
        ]);
        DB::table('ref_bank')->insert([
            'code' => 'BRI',
            'name' => 'Bank Rakyat Indonesia',
        ]);
        DB::table('ref_bank')->insert([
            'code' => 'BSI',
            'name' => 'Bank Syariah Indonesia',
        ]);
        DB::table('ref_bank')->insert([
            'code' => 'BTN',
            'name' => 'Bank Tabungan Negara',
        ]);
        DB::table('ref_bank')->insert([
            'code' => 'BMU',
            'name' => 'Bank Muamalat',
        ]);
        DB::table('ref_bank')->insert([
            'code' => 'BMR',
            'name' => 'Bank Mandiri',
        ]);
    }
}

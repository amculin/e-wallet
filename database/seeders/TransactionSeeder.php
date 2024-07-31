<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    public function createRandomID()
    {
        $randomString = md5(Str::random(7));
        $newStrings = [
            substr($randomString, 0, 8),
            substr($randomString, 8, 16),
            substr($randomString, 24)
        ];

        return implode('-', $newStrings);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaction')->insert([
            'wallet_id' => 1,
            'order_id' => $this->createRandomID(),
            'amount' => 150000.00,
            'type' => 1,
            'status' => 1,
            'additional_data' => json_encode([
                'bank_id' => 2,
                'account_number' => '02237649920',
                'account_name' => 'Alex Kirkman'
            ]),
            'created_at' => '2024-07-01 10:25:18',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 1,
            'order_id' => $this->createRandomID(),
            'amount' => 117600.00,
            'type' => 3,
            'status' => 1,
            'additional_data' => json_encode([
                'merchant_id' => '800029298881010110',
                'merchant_name' => 'Warung Seblak Gumoh'
            ]),
            'created_at' => '2024-07-01 10:45:51',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 1,
            'order_id' => $this->createRandomID(),
            'amount' => 250000.00,
            'type' => 1,
            'status' => 1,
            'additional_data' => json_encode([
                'bank_id' => 2,
                'account_number' => '02237649920',
                'account_name' => 'Alex Kirkman'
            ]),
            'created_at' => '2024-07-01 11:17:44',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 2,
            'order_id' => $this->createRandomID(),
            'amount' => 500000.00,
            'type' => 1,
            'status' => 1,
            'additional_data' => json_encode([
                'bank_id' => 3,
                'account_number' => '647531181',
                'account_name' => 'Chuck Russink'
            ]),
            'created_at' => '2024-07-01 12:55:19',
            'created_by' => 3
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 2,
            'order_id' => $this->createRandomID(),
            'amount' => 15500.00,
            'type' => 3,
            'status' => 1,
            'additional_data' => json_encode([
                'merchant_id' => '207020098051020110',
                'merchant_name' => 'Gate Tol Jogja A'
            ]),
            'created_at' => '2024-07-01 13:20:39',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 2,
            'order_id' => $this->createRandomID(),
            'amount' => 37000.00,
            'type' => 3,
            'status' => 1,
            'additional_data' => json_encode([
                'merchant_id' => '200020038041089117',
                'merchant_name' => 'Gate Tol Magelang A'
            ]),
            'created_at' => '2024-07-01 14:06:13',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 2,
            'order_id' => $this->createRandomID(),
            'amount' => 89542.00,
            'type' => 3,
            'status' => 1,
            'additional_data' => json_encode([
                'merchant_id' => '400024098021069191',
                'merchant_name' => 'Indomaret Secang'
            ]),
            'created_at' => '2024-07-01 14:39:20',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 1,
            'order_id' => $this->createRandomID(),
            'amount' => 74800.00,
            'type' => 3,
            'status' => 1,
            'additional_data' => json_encode([
                'merchant_id' => '800024298081020810',
                'merchant_name' => 'Kafe Gaul Abizz'
            ]),
            'created_at' => '2024-07-04 12:23:01',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 1,
            'order_id' => $this->createRandomID(),
            'amount' => 25500.00,
            'type' => 3,
            'status' => 1,
            'additional_data' => json_encode([
                'merchant_id' => '300014208081020877',
                'merchant_name' => 'Warung Pulsa DEF'
            ]),
            'created_at' => '2024-07-04 12:48:31',
            'created_by' => 2
        ]);
        DB::table('transaction')->insert([
            'wallet_id' => 1,
            'order_id' => $this->createRandomID(),
            'amount' => 1000000.00,
            'type' => 2,
            'status' => 0,
            'additional_data' => json_encode([
                'code' => '00',
                'message' => 'Insufficient Balance',
                'bank_id' => 2,
                'account_number' => '02237649920',
                'account_name' => 'Alex Kirkman'
            ]),
            'created_at' => '2024-07-09 19:57:04',
            'created_by' => 2
        ]);
    }
}

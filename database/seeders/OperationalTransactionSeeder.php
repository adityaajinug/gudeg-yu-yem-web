<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OperationalTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('operational_transactions')->insert([
            [
                'operational_name' => 'Beli Gas Elpiji',
                'price' => 200000,
                'description' => 'Pembelian gas untuk dapur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'operational_name' => 'Beli Air Galon',
                'price' => 50000,
                'description' => 'Air minum untuk staf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'operational_name' => 'Bayar Listrik',
                'price' => 350000,
                'description' => 'Tagihan listrik bulanan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

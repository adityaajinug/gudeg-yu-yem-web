<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BigOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('big_orders')->insert([
            [
                'name'        => 'PT Sumber Pangan Sejahtera',
                'address'    => 'Jl. Imam Bonjol, Semarang',
                'date'        => now(),
                'description' => 'Pesan gudeg untuk acara peresmian gedung.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'CV Makmur Jaya',
                'address'    => 'Jl. Kaliurang Km 5, Sleman',
                'date'        => now()->addDays(2),
                'description' => 'Pesanan besar gudeg untuk konsumsi rapat tahunan.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}

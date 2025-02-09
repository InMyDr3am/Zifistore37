<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVarianDetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variant_dets')->insert([
            ['name' => 'Sosis Beef Original'],
            ['name' => 'Sosis Beef Pedas'],
            ['name' => 'Ayam Sayur Original'],
            ['name' => 'Ayam Sayur Pedas'],
            ['name' => 'Bihun Original'],
            ['name' => 'Bihun Pedas'],
            
        ]);
    }
}

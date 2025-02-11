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
            ['name' => 'Sosis Beef Original', 'product_variants_id' => 1],
            ['name' => 'Sosis Beef Pedas', 'product_variants_id' => 1],
            ['name' => 'Ayam Sayur Original', 'product_variants_id' => 2],
            ['name' => 'Ayam Sayur Pedas', 'product_variants_id' => 2],
            ['name' => 'Bihun Original', 'product_variants_id' => 3],
            ['name' => 'Dark Coklat', 'product_variants_id' => 4],
            ['name' => 'Coklat Putih', 'product_variants_id' => 4],
            ['name' => 'Udang', 'product_variants_id' => 5],
            ['name' => 'Ayam', 'product_variants_id' => 5],
            ['name' => 'Jamur', 'product_variants_id' => 5],
            
            
        ]);
    }
}

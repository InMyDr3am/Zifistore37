<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Dimsum Ayam',
                'product_category_id' => 3,
                'product_brand_id' => 4,
                'stock' => 100,
                'min_stock' => 4,
                'cost_price' => 2000,
                'offline_price' => 2500,
                'marketplace_price' => 3000,

            ],
            [
                'name' => 'Dimsum Udang',
                'product_category_id' => 3,
                'product_brand_id' => 4,
                'stock' => 100,
                'min_stock' => 4,
                'cost_price' => 2000,
                'offline_price' => 2500,
                'marketplace_price' => 3000,

            ],
            [
                'name' => 'Dimsum Jamur',
                'product_category_id' => 3,
                'product_brand_id' => 4,
                'stock' => 100,
                'min_stock' => 4,
                'cost_price' => 2000,
                'offline_price' => 2500,
                'marketplace_price' => 3000,

            ],
            
        ]);
    }
}

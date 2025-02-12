<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_brands')->insert([
            ['name' => 'Hot Wheels'],
            ['name' => 'Mini GT'],
            ['name' => 'Inno64'],
            ['name' => 'Yansfood'],
            ['name' => 'Unknown Brand'],
            
        ]);
    }
}

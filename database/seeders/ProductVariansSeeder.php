<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variants')->insert([
            ['name' => 'Variant Risol Mayo'],
            ['name' => 'Variant Risol Ayam'],
            ['name' => 'Variant Kroket'],
            ['name' => 'Variant Piscok'],
            ['name' => 'Variant Dimsum'],
            
        ]);
    }
}

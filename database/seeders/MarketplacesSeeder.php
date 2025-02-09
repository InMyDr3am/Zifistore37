<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketplacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marketplaces')->insert([
            ['name' => 'Offline'],
            ['name' => 'Tokopedia'],
            ['name' => 'Shopee'],
            
        ]);
    }
}

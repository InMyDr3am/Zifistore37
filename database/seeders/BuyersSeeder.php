<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuyersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buyers')->insert([
            ['name' => 'John Doe', 'phone' => '081234567890', 'slug' => 'John-Doe-081234567890', 'address' => 'Jl. Merdeka No. 1, Jakarta'],
            ['name' => 'Jane Smith', 'phone' => '082345678901', 'slug' => 'Jane-Smith-082345678901','address' => 'Jl. Sudirman No. 2, Bandung'],
            ['name' => 'Alice Johnson', 'phone' => '083456789012','slug' => 'Alice-Johnson-083456789012', 'address' => 'Jl. Kebon Jeruk No. 3, Surabaya'],
            ['name' => 'Bob Brown', 'phone' => '084567890123','slug' => 'Bob-Brown-084567890123', 'address' => 'Jl. Pahlawan No. 4, Medan'],
            ['name' => 'Charlie Green', 'phone' => '085678901234', 'slug' => 'Charlie-Green-085678901234', 'address' => 'Jl. Gajah Mada No. 5, Yogyakarta'],
            ['name' => 'Diana White', 'phone' => '086789012345', 'slug' => 'Diana-White-086789012345', 'address' => 'Jl. Jendral No. 6, Bali'],
            ['name' => 'Eve Black', 'phone' => '087890123456', 'slug' => 'Eve-Black-087890123456', 'address' => 'Jl. Raya No. 7, Malang'],
            ['name' => 'Frank Blue', 'phone' => '088901234567', 'slug' => 'Frank-Blue-088901234567', 'address' => 'Jl. Cempaka No. 8, Solo'],
            ['name' => 'Grace Yellow', 'phone' => '089012345678', 'slug' => 'Grace-Yellow-089012345678', 'address' => 'Jl. Anggrek No. 9, Makassar'],
            ['name' => 'Henry Red', 'phone' => '081123456789', 'slug' => 'Henry-Red-081123456789', 'address' => 'Jl. Mawar No. 10, Palembang'],
        ]);
    }
}

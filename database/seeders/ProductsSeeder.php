<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'brand' => 'Adidas',
            'modell' => 'Predator', 
            'color' => 'black', 
            'size' => 39, 
            'stock' => 20, 
            'price' => 15000,
        ]);

        DB::table('products')->insert([
            'brand' => 'New Balance',
            'modell' => '500', 
            'color' => 'black', 
            'size' => 41, 
            'stock' => 20, 
            'price' => 40000, 
        ]);

        DB::table('products')->insert([
            'brand' => 'Adidas',
            'modell' => 'Ultraboost', 
            'color' => 'black', 
            'size' => 42, 
            'stock' => 20, 
            'price' => 60000,
        ]);
    }
}

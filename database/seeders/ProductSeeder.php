<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Empanada de Carne X Unidad',
            'price' => 1200.00,
        ]);

        Product::create([
            'name' => 'Empanada de Pollo X Unidad',
            'price' => 1100.00,
        ]);
        Product::create([
            'name' => 'Empanada de JyQ X Unidad',
            'price' => 1000.00,
        ]);
    }
}

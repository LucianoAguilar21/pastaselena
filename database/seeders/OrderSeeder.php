<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'created_by' => 1,
            'customer_id' => 1,
            'total_amount' => 3000.00,
            'status'=> 'new',
            'delivery_date' => now()->addDays(2),
            'paid' => false,
            'with_delivery' => true,
            'total_amount' => 3000.00,
        ]);
    }
}

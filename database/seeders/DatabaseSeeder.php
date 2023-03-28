<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Deliver;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $deliveries = [
            ['delivery_number' => '1', 'product_id' => '1', 'quantity' => '300', 'cost' => '5000', 'date' => '2021-01-01',],
            ['delivery_number' => 't-500', 'product_id' => '2', 'quantity' => '10', 'cost' => '6000', 'date' => '2021-01-02',],
            ['delivery_number' => '12-TP-777', 'product_id' => '3', 'quantity' => '100', 'cost' => '500', 'date' => '2021-01-13',],
            ['delivery_number' => '12-TP-778', 'product_id' => '3', 'quantity' => '50', 'cost' => '300', 'date' => '2021-01-14',],
            ['delivery_number' => '12-TP-779', 'product_id' => '3', 'quantity' => '77', 'cost' => '539', 'date' => '2021-01-20',],
            ['delivery_number' => '12-TP-877', 'product_id' => '3', 'quantity' => '32', 'cost' => '176', 'date' => '2021-01-30',],
            ['delivery_number' => '12-TP-977', 'product_id' => '3', 'quantity' => '94', 'cost' => '554', 'date' => '2021-02-01',],
            ['delivery_number' => '12-TP-979', 'product_id' => '3', 'quantity' => '200', 'cost' => '1000', 'date' => '2021-02-05',],
        ];


        Product::insert([
            ['name' => 'Колбаса', 'quantity' => 0],
            ['name' => 'Пармезан', 'quantity' => 0],
            ['name' => 'Левый носок', 'quantity' => 0],
        ]);
        Deliver::insert(
            $deliveries
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrderItemSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderRange = 50;
        $faker = Faker::create();
        foreach (range(1,$orderRange) as $createOder){
            $order = new OrderItem();
            $order->order_id = Order::inRandomOrder()->first()->id; #dont know if it will works..
            $order->product_id = Product::inRandomOrder()->first()->id;
            $order->quantity = rand(1,5);
            $order->save();
        }
    }
}

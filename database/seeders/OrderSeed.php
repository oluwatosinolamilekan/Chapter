<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrderSeed extends Seeder
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
            $order = new Order();
            $order->user_id = User::inRandomOder()->first()->id;
            $order->invoice_number = $faker->words(23);
            $order->amount = rand(1111,9999);
            $order->status = rand(0,1);
            $order->save();
        }
    }
}

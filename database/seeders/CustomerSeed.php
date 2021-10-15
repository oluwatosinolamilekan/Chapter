<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerRange = 200;
        $faker = Faker::create();
        foreach (range(1,$customerRange) as $createCustomer){
            $customer = new Customer();
            $customer->name = $faker->name;
            $customer->email = $faker->unique()->email;
            $customer->save();
        }
    }
}

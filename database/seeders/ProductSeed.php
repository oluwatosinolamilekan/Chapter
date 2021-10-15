<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRange = 100;
        $faker = Faker::create();
        foreach (range(1,$productRange) as $createProduct){
            $product = new Product();
            $product->name = $faker->name;
            $product->price = rand(1111,9999);
            $product->in_stock = rand(0,1);
            $product->save();
        }
    }
}

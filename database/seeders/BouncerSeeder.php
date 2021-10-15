<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Silber\Bouncer\Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('administrator')->everything();
        Bouncer::allow('shop-manager')->to('view', Order::class);
        Bouncer::allow('shop-manager')->to('view', Product::class);

    }
}

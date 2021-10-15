<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminstator = [
            'name' => 'adminstartor',
            'email' => 'adminstartor@mail.com',
            'password' => Hash::make('password'),
            'role' => 1
        ];
        User::create($adminstator);
        $usermanager = [
            'name' => 'user-manager',
            'email' => 'user-manager@mail.com',
            'password' => Hash::make('password'),
            'role' => 2
        ];
        User::create($usermanager);
        $shopmanager = [
            'name' => 'shop-manager',
            'email' => 'shop-manager@mail.com',
            'password' => Hash::make('password'),
            'role' => 3
        ];
        User::create($shopmanager);

    }
}

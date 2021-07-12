<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert(
            [
                [
                    "id" => 1,
                    "username" => "random_joe",
                    "email" => "random_joe@mail.com",
                    "first_name" => "Random",
                    "last_name" => "Joe",
                    "customer_id" => "e0c523cd-3dfd-4206-83b4-9c0dc32dd77e"
                ],
                [
                    "id" => 2,
                    "username" => "average_joe",
                    "email" => "average_joe@mail.com",
                    "first_name" => "Average",
                    "last_name" => "Joe",
                    "customer_id" => "some-cool-hash-here"
                ]
            ]
        );

    }
}

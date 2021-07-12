<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerProviderSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('customer_provider')->insert(
            [
                [
                    "id" => 1,
                    "id_customer" => 1,
                    "id_provider" => 1
                ],
                [
                    "id" => 2,
                    "id_customer" => 1,
                    "id_provider" => 2
                ],
                [
                    "id" => 3,
                    "id_customer" => 1,
                    "id_provider" => 3
                ],
                [
                    "id" => 4,
                    "id_customer" => 2,
                    "id_provider" => 1
                ]
            ]
        );

    }
}

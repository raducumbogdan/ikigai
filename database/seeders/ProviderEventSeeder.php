<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderEventSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('provider_event')->insert(
            [
                [
                    "id" => 1,
                    "id_provider" => 1,
                    "id_event" => 1,
                    "slug" => "in-person",
                ],
                [
                    "id" => 2,
                    "id_provider" => 1,
                    "id_event" => 1,
                    "slug" => "in-store-txn",
                ],
                [
                    "id" => 3,
                    "id_provider" => 1,
                    "id_event" => 2,
                    "slug" => "online",
                ],
                [
                    "id" => 4,
                    "id_provider" => 1,
                    "id_event" => 3,
                    "slug" => "withdrawal",
                ],
                [
                    "id" => 5,
                    "id_provider" => 2,
                    "id_event" => 1,
                    "slug" => "27",
                ],
                [
                    "id" => 6,
                    "id_provider" => 2,
                    "id_event" => 2,
                    "slug" => "31",
                ],
                [
                    "id" => 7,
                    "id_provider" => 2,
                    "id_event" => 3,
                    "slug" => "2",
                ],
                [
                    "id" => 8,
                    "id_provider" => 3,
                    "id_event" => 1,
                    "slug" => "store-transaction",
                ],
                [
                    "id" => 9,
                    "id_provider" => 3,
                    "id_event" => 2,
                    "slug" => "ecommerce-transaction",
                ],
                [
                    "id" => 10,
                    "id_provider" => 3,
                    "id_event" => 3,
                    "slug" => "atm",
                ],
            ]
        );
    }
}

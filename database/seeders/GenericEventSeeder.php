<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenericEventSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('generic_event')->insert(
            [
                [
                    "id" => 1,
                    "name" => "In store transaction",
                    "slug" => "in-store-transaction"
                ],
                [
                    "id" => 2,
                    "name" => "Online transaction",
                    "slug" => "online-transaction"
                ],
                [
                    "id" => 3,
                    "name" => "ATM withdrawal",
                    "slug" => "atm-withdrawal"
                ],
                [
                    "id" => 4,
                    "name" => "Undefined",
                    "slug" => "undefined"
                ],
            ]
        );

    }
}

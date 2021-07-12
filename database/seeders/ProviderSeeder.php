<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('provider')->insert(
            [
                [
                    "id" => 1,
                    "name" => "Ikigai",
                    "service_name" => "IkigaiService"
                ],
                [
                    "id" => 2,
                    "name" => "Bank one",
                    "service_name" => "Bank1Service"
                ],
                [
                    "id" => 3,
                    "name" => "Bank two",
                    "service_name" => "Bank2Service"
                ]
            ]
        );
    }
}

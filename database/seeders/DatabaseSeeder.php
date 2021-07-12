<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenericEventSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProviderSeeder::class);
        $this->call(CustomerProviderSeeder::class);
        $this->call(ProviderEventSeeder::class);
//        $this->call(ProcessedTransactionSeeder::class);
//        $this->call(RawTransactionSeeder::class);
    }
}

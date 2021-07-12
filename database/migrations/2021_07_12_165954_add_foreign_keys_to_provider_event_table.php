<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProviderEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provider_event', function (Blueprint $table) {
            $table->foreign('id_provider', 'provider_event_ibfk_1')->references('id')->on('provider');
            $table->foreign('id_event', 'provider_event_ibfk_2')->references('id')->on('generic_event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provider_event', function (Blueprint $table) {
            $table->dropForeign('provider_event_ibfk_1');
            $table->dropForeign('provider_event_ibfk_2');
        });
    }
}

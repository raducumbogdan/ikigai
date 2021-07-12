<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProcessedTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('processed_transaction', function (Blueprint $table) {
            $table->foreign('id_event', 'fk_id_event')->references('id')->on('generic_event');
            $table->foreign('id_provider', 'fk_id_provider')->references('id')->on('provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('processed_transaction', function (Blueprint $table) {
            $table->dropForeign('fk_id_event');
            $table->dropForeign('fk_id_provider');
        });
    }
}

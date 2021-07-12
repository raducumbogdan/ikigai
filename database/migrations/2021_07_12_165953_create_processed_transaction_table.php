<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessedTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_transaction', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_provider')->index('fk_id_provider');
            $table->integer('id_event')->index('fk_id_event');
            $table->integer('id_customer');
            $table->integer('id_raw_transaction');
            $table->decimal('value', 16, 8);
            $table->decimal('btc_value', 16, 8);
            $table->string('status', 15)->nullable();
            $table->string('transaction_unique_id');
            $table->dateTime('transaction_time')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processed_transaction');
    }
}

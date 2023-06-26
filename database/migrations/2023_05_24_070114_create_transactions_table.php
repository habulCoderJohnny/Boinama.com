<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->text('txn_number')->nullable();
            $table->double('amount')->default(0);
            $table->binary('currency_sign')->nullable();
            $table->string('currency_code', 255)->nullable();
            $table->double('currency_value')->default(0);
            $table->string('method', 255)->nullable();
            $table->string('txnid', 255)->nullable();
            $table->text('details')->nullable();
            $table->integer('reward_point')->default(0);
            $table->double('reward_dolar')->default(0);
            $table->string('type', 255)->nullable()->comment('plus, minus, reward');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

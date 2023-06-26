<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewaysTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subtitle', 191)->nullable();
            $table->string('title', 191)->nullable();
            $table->text('details')->nullable();
            $table->string('name', 100)->nullable();
            $table->enum('type', ['manual', 'automatic'])->default('manual');
            $table->mediumText('information')->nullable();
            $table->string('keyword', 191)->nullable();
            $table->tinyInteger('is_checkout')->default(1);
            $table->tinyInteger('is_deposite')->default(1);
            $table->tinyInteger('is_subscription')->default(1);
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
        Schema::dropIfExists('payment_gateways');
    }
}

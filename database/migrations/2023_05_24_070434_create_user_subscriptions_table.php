<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscriptionsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('subscription_id');
            $table->text('title');
            $table->string('currency', 50);
            $table->string('currency_code', 50);
            $table->double('price')->default(0);
            $table->integer('days');
            $table->integer('allowed_products')->default(0);
            $table->text('details')->nullable();
            $table->string('method', 50)->default('Free');
            $table->string('txnid', 255)->nullable();
            $table->string('charge_id', 255)->nullable();
            $table->timestamps();
            $table->integer('status')->default(0);
            $table->text('payment_number')->nullable();
            $table->string('flutter_id', 191)->nullable();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_subscriptions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('is_read')->default(0);

            // Define foreign key constraints
            $table->foreignId('order_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('vendor_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('conversation_id')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('conversation_id');
            $table->text('message');
            $table->unsignedBigInteger('sent_user')->nullable();
            $table->unsignedBigInteger('received_user')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
            $table->foreign('sent_user')->references('id')->on('users')->onDelete('set null');
            $table->foreign('received_user')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

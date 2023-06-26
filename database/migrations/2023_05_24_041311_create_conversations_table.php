<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->unsignedBigInteger('sent_user');
            $table->unsignedBigInteger('received_user');
            $table->text('message')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();

            $table->foreign('sent_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('received_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}

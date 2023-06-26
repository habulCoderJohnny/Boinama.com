<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('attachments')->nullable();
            $table->enum('status', ['Pending', 'Verified', 'Declined'])->nullable();
            $table->text('text')->nullable();
            $table->boolean('admin_warning')->default(false);
            $table->text('warning_reason')->nullable();
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
        Schema::dropIfExists('verifications');
    }
}

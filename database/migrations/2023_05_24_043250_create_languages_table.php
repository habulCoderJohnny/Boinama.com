<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('rtl')->default(0);
            $table->boolean('is_default')->default(false);
            $table->string('language', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('file', 100)->nullable();
            $table->integer('preloaded')->default(0);
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
        Schema::dropIfExists('languages');
    }
}

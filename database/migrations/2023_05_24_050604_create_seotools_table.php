<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeotoolsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seotools', function (Blueprint $table) {
            $table->increments('id');
            $table->text('google_analytics')->nullable();
            $table->text('meta_keys')->nullable();
            $table->string('facebook_pixels', 100)->nullable();
            $table->string('meta_title', 100)->nullable();
            $table->string('meta_description', 200)->nullable();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seotools');
    }
}

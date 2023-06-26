<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsCategoryRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_category_relations', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('category_type', 30)->nullable();
            $table->integer('cs_category_id')->nullable();
            $table->string('cs_category_type', 30)->nullable();
            $table->string('search_type', 20)->default('random')->comment('random - related products will be shown randomly, keyword - related products will be shown keyword wise');
            $table->integer('owner_id')->default(0);
            $table->integer('preloaded')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cs_category_relations');
    }
}

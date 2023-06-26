<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('attributable_id')->nullable();
            $table->string('attributable_type')->nullable();
            $table->string('name')->nullable();
            $table->string('input_name')->nullable();
            $table->integer('price_status')->default(1)->comment('0 - hide, 1 - show');
            $table->integer('details_status')->default(1)->comment('0 - hide, 1 - show');
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
        Schema::dropIfExists('attributes');
    }
}

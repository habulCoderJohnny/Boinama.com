<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossSellingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_selling_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('cross_selling_product_id')->nullable();
            $table->string('type', 20)->nullable()->comment('vendor / admin');
            $table->timestamps();
            $table->integer('owner_id')->default(0);
            $table->integer('preloaded')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cross_selling_products');
    }
}

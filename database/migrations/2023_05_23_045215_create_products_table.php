<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->enum('product_type', ['normal', 'affiliate'])->default('normal');
            $table->text('affiliate_link')->nullable();
            $table->integer('user_id')->default(0);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->unsignedInteger('childcategory_id')->nullable();
            $table->json('attributes')->nullable(); // Add the 'attributes' column here
            // $table->index(['attributes'])->nullable(); // Create an index on 'attributes'
            $table->text('name');
            $table->text('slug')->nullable();
            $table->string('photo');
            $table->string('thumbnail')->nullable();
            $table->string('file')->nullable();
            $table->string('pdf')->nullable();
            $table->string('size')->nullable();
            $table->string('size_qty')->nullable();
            $table->string('size_price')->nullable();
            $table->text('color')->nullable();
            $table->double('price');
            $table->double('previous_price')->nullable();
            $table->text('details')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('min_qty')->default(1);
            $table->text('policy')->nullable();
            $table->text('specification')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedInteger('views')->default(0);
            $table->string('tags')->nullable();
            $table->text('features')->nullable();
            $table->text('colors')->nullable();
            $table->unsignedTinyInteger('product_condition')->default(0);
            $table->string('ship')->nullable();
            $table->unsignedTinyInteger('is_meta')->default(0);
            $table->text('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('youtube')->nullable();
            $table->enum('type', ['Physical', 'Digital', 'License']);
            $table->text('license')->nullable();
            $table->text('license_qty')->nullable();
            $table->text('link')->nullable();
            $table->string('platform')->nullable();
            $table->string('region')->nullable();
            $table->string('licence_type')->nullable();
            $table->string('measure')->nullable();
            $table->unsignedTinyInteger('featured')->default(0);
            $table->unsignedTinyInteger('best')->default(0);
            $table->unsignedTinyInteger('top')->default(0);
            $table->unsignedTinyInteger('hot')->default(0);
            $table->unsignedTinyInteger('latest')->default(0);
            $table->unsignedTinyInteger('big')->default(0);
            $table->unsignedTinyInteger('trending')->default(0);
            $table->unsignedTinyInteger('sale')->default(0);
            $table->unsignedTinyInteger('is_discount')->default(0);
            $table->text('discount_date')->nullable();
            $table->text('whole_sell_qty')->nullable();
            $table->text('whole_sell_discount')->nullable();
            $table->unsignedTinyInteger('is_catalog')->default(0);
            $table->integer('catalog_id')->default(0);
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 191)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->tinyInteger('type');
            $table->double('price');
            $table->string('times', 191)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->unsignedBigInteger('used')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('coupon_type', 255)->nullable();
            $table->integer('category')->nullable();
            $table->integer('sub_category')->nullable();
            $table->integer('child_category')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}

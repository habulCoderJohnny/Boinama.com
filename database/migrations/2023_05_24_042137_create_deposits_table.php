<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->nullable();
            $table->binary('currency')->nullable();
            $table->string('currency_code', 255)->nullable();
            $table->double('amount')->default(0);
            $table->double('currency_value')->default(0);
            $table->string('method', 255)->nullable();
            $table->string('txnid', 255)->nullable();
            $table->text('flutter_id')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('deposits');
    }
}

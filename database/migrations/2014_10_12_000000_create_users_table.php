<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('state')->default(0);
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->tinyInteger('is_provider')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->text('verification_link')->nullable();
            $table->enum('email_verified', ['Yes', 'No'])->default('No');
            $table->text('affilate_code')->nullable();
            $table->double('affilate_income')->default(0);
            $table->double('current_balance')->default(0);
            $table->double('balance')->default(0);
            $table->date('date')->nullable();
            $table->tinyInteger('ban')->default(0);
            $table->integer('reward')->default(0);
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
        Schema::dropIfExists('users');
    }
}
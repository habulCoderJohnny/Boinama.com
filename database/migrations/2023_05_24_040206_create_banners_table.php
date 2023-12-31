<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('photo', 191)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('link', 191)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->enum('type', ['Large', 'TopSmall', 'BottomSmall'])->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
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
        Schema::dropIfExists('banners');
    }
}

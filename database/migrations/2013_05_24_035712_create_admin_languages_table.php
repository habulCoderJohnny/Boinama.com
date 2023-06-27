<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_languages', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_default')->default(0);
            $table->string('language', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('file', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('name', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->tinyInteger('rtl')->default(0);
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
        Schema::dropIfExists('admin_languages');
    }
}

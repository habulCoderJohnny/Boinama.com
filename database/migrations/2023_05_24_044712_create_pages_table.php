<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('slug', 191)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('details')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('meta_tag')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('meta_description')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->boolean('header')->default(0);
            $table->boolean('footer')->default(0);
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
        Schema::dropIfExists('pages');
    }
}

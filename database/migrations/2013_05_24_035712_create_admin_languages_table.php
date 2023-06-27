<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::transaction(function () {
            DB::statement("
        INSERT INTO `admin_languages` (`id`, `is_default`, `language`, `file`, `name`, `rtl`) VALUES
        (1, 1, 'English', '1567232745AoOcvCtY.json', '1567232745AoOcvCtY', 0),
        (2, 0, 'RTL English', '1584887310NzfWDhO8.json', '1584887310NzfWDhO8', 1);
    ");
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

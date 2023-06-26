<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesettingsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagesettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_success', 191)->nullable(false);
            $table->string('contact_email', 191)->nullable(false);
            $table->text('contact_title')->nullable();
            $table->text('contact_text')->nullable();
            $table->text('side_title')->nullable();
            $table->text('side_text')->nullable();
            $table->text('street')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->text('email')->nullable();
            $table->text('site')->nullable();
            $table->boolean('slider')->default(true);
            $table->boolean('service')->default(true);
            $table->boolean('featured')->default(true);
            $table->boolean('small_banner')->default(true);
            $table->boolean('best')->default(true);
            $table->boolean('top_rated')->default(true);
            $table->boolean('large_banner')->default(true);
            $table->boolean('big')->default(true);
            $table->boolean('hot_sale')->default(true);
            $table->boolean('partners')->default(false);
            $table->boolean('review_blog')->default(true);
            $table->text('best_seller_banner')->nullable();
            $table->text('best_seller_banner_link')->nullable();
            $table->text('big_save_banner')->nullable();
            $table->text('big_save_banner_link')->nullable();
            $table->boolean('bottom_small')->default(false);
            $table->boolean('flash_deal')->default(false);
            $table->text('best_seller_banner1')->nullable();
            $table->text('best_seller_banner_link1')->nullable();
            $table->text('big_save_banner1')->nullable();
            $table->text('big_save_banner_link1')->nullable();
            $table->boolean('featured_category')->default(false);
            $table->string('slider_right_banner1')->nullable();
            $table->string('slider_right_banner2')->nullable();
            $table->string('slider_right_banner_link')->nullable();
            $table->string('gallery_large_banner')->nullable();
            $table->string('slider_right_banner_link1')->nullable();
            $table->string('gallery_large_banner_link')->nullable();
            $table->string('gallery_small_banner1')->nullable();
            $table->string('gallery_small_banner2')->nullable();
            $table->string('gallery_small_banner3')->nullable();
            $table->string('gallery_small_banner4')->nullable();
            $table->string('gallery_small_banner_link1')->nullable();
            $table->string('gallery_small_banner_link2')->nullable();
            $table->string('gallery_small_banner_link3')->nullable();
            $table->string('gallery_small_banner_link4')->nullable();
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
        Schema::dropIfExists('pagesettings');
    }
}

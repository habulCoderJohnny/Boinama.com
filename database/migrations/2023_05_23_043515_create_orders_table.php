<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->text('cart');
            $table->string('method')->nullable();
            $table->string('shipping')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('totalQty');
            $table->float('pay_amount');
            $table->string('txnid')->nullable();
            $table->string('charge_id')->nullable();
            $table->string('order_number');
            $table->string('payment_status');
            $table->string('customer_email');
            $table->string('customer_name');
            $table->string('customer_division');
            $table->string('customer_district');
            $table->string('customer_upazila');
            $table->string('customer_phone');
            $table->string('customer_address')->nullable();
            $table->string('customer_zip')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_division')->nullable();
            $table->string('shipping_district')->nullable();
            $table->string('shipping_upazila')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->text('order_note')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'declined', 'on delivery', 'refund'])->default('pending');
            $table->string('affilate_user')->nullable();
            $table->string('affilate_charge')->nullable();
            $table->string('currency_sign');
            $table->double('currency_value');
            $table->double('shipping_cost');
            $table->double('packing_cost')->default(0);
            $table->tinyInteger('dp')->default(0);
            $table->double('commission')->default(0);
            $table->text('pay_id')->nullable();
            $table->integer('wallet_price')->nullable();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('orders');
    }
}

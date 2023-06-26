<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['user_id', 'cart', 'tax_location', 'method','shipping', 'pickup_location', 'totalQty', 'pay_amount', 'txnid', 'charge_id', 'order_number', 'payment_status', 'customer_email', 'customer_name', 'customer_phone', 'customer_address', 'customer_city', 'customer_zip','shipping_name', 'shipping_email', 'shipping_phone', 'shipping_address', 'shipping_city', 'shipping_zip', 'order_note', 'status','commission'];


    public function tracks()
    {
        return $this->hasMany('App\Models\OrderTrack','order_id');
    }

    public function refund()
    {
        return $this->hasOne('App\Models\Refund','order_number','order_number');
    }

}

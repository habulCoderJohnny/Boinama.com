<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrossSellingProduct extends Model
{
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

    public function cross_sold_product() {
        return $this->belongsTo('App\Models\Product', 'cross_selling_product_id');
    }
}

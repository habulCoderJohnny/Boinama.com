<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsCategoryRelation extends Model
{
    protected $fillable = ['category_id', 'category_type', 'cs_category_id', 'cs_category_type', 'search_type','owner_id','preloaded'];

    public $timestamps = false;

    public function category()
    {
        return $this->morphTo();
    }

    public function cs_category()
    {
        return $this->morphTo();
    }
}

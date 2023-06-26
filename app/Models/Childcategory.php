<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    protected $fillable = ['subcategory_id', 'name', 'slug'];
    public $timestamps = false;

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }

    /*
    public function products()
    {
    return $this->hasMany('App\Models\Product');
    }

     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '-', $value);
    }

    public function attributes()
    {
        return $this->morphMany('App\Models\Attribute', 'attributable');
    }

    public function category_relation()
    {
        return $this->morphOne('App\Models\CsCategoryRelation', 'category');
    }

    public function cs_category_relation()
    {
        return $this->morphOne('App\Models\CsCategoryRelation', 'cs_category');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_child_categories', 'childcategory_id', 'product_id');
    }
}

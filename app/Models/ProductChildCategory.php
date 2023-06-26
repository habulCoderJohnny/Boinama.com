<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductChildCategory extends Model
{
    use HasFactory;
    protected $table = 'product_child_categories';
    protected $fillable = [
        'product_id',
        'childcategory_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function childcategory()
    {
        return $this->belongsTo(Childcategory::class);
    }
}

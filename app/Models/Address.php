<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "address", "district", "division", "upazila", "name", "mobile", "email", "is_default", "status"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function size()
    {
        return $this->hasOne(Size::class, 'foreign_key');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'foreign_key');
    }
}

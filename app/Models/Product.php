<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    const KEYS_FIELDS = [
        'id', 'name', 'quantity', 
        'brand_id', 'size_id', 'remarks',
        'date_shipment'
    ];
    public function size()
    {
        return $this->hasOne(Size::class, 'foreign_key');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'foreign_key');
    }
    
}

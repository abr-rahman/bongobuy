<?php

namespace App\Models;

use App\Models\BaseModel;

class Cart extends BaseModel
{
    protected $fillable = [
        'offline_customer_id',
        'color_id',
        'size_id',
        'product_id',
        'quantity',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}

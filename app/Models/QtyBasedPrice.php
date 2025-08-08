<?php

namespace App\Models;

use App\Models\BaseModel;

class QtyBasedPrice extends BaseModel
{
    protected $fillable = [
        'id',
        'product_id',
        'quantity',
        'price',
        'save_price',
        'more_qty',
        'title',
        'status',
    ];
}

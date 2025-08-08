<?php

namespace App\Models;

use App\Models\BaseModel;

class Inventory extends BaseModel
{
    protected $guarded = [];

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

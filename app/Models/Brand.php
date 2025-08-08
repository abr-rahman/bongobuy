<?php

namespace App\Models;

use App\Models\BaseModel;

class Brand extends BaseModel
{
    protected $fillable = ['name', 'status','slug'];

    public function product()
    {
        return $this->hasMany(Product::class, 'id');
    }
}

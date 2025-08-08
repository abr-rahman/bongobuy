<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $fillable = [
        'product_id',
        'color_id',
        'color_images',
    ];

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

}

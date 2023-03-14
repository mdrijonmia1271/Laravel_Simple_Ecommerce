<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_price',
        
    ];

    public function price()
    {
        return $this->belongsTo(ProductPrice::class, 'product_id');
    }
}

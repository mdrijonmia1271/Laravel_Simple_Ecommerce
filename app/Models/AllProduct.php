<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_id',
        'sub_category_id',
        'color_id',
        'size_id',
        'packet_id',
        'quantity',
        'product_description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function sizes()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
    public function packets()
    {
        return $this->belongsTo(Packet::class, 'packet_id');
    }
    public function price()
    {
        return $this->hasOne(ProductPrice::class, 'product_id');
    }

}
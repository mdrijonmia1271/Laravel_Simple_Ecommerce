<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color_name',
        'sub_category_id',
        'color_description',
        'status' 
    ];

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}

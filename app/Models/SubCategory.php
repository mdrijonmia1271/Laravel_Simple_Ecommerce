<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_name',
        'categories_id',
        'sub_category_description', 
        'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'categories_id');
    }
}

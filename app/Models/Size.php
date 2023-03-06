<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_name',
        'color_id',
        'size_description',
        'status' 
    ];

    public function colored(){
        return $this->belongsTo(Color::class,'color_id');
    }
}
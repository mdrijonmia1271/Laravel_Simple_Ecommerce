<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasFactory;

    protected $fillable = [
        'packet_name',
        'size_id',
        'packet_description',
        'status'
    ];

    public function sized(){
        return $this->belongsTo(Size::class,'size_id');
    }
}

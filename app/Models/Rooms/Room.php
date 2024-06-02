<?php

namespace App\Models\Rooms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'max_person', 'size', 'view', 'nums_bed', 'price', 'hotel_id'
    ];

    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotels\Hotel::class);
    }
}


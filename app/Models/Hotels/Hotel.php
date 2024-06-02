<?php

namespace App\Models\Hotels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = "hotels";

    protected $fillable = [
        'name',
        'image',
        'description',
        'location',
    ];

    protected $timestramp = true;

    public function rooms()
    {
        return $this->hasMany(\App\Models\Rooms\Room::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['room','division'];


    public function room()
    {
        return $this->belongsTo(Room::class,'id_room');
    }

    public function division()
    {
        return $this->belongsTo(Division::class,'id_division');
    }
}

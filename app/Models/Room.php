<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['department'];

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'id_department');

    }
}

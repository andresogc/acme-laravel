<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;


    public function userPropietario()
    {
        return $this->belongsTo(User::class,'propietario_id');
    }


    public function userConductor()
    {
        return $this->belongsTo(User::class,'conductor_id');
    }
}

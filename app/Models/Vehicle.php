<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'status',
        'driver_name'
    ];



    public function fuels(){
        return $this->hasMany(VehicleFuel::class);
    }

    public function maintenance(){
        return $this->hasMany(VehicleMaintenance::class);
    }
}

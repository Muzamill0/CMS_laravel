<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleFuel extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'date',
        'meter_readings',
        'price_per_unit',
        'total_fuel',
        'total_price',
        'location',
    ];


    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}

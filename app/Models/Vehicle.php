<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'vehicle_no',
        'driver_name',
        'brand_name',
        'chases_no',
        'engine_no',
        'model_no',
        'reg_date',
        'reg_authority',
        'engine_capacity',
        'vehicle_value',
        'status',
    ];



    public function fuels(){
        return $this->hasMany(VehicleFuel::class);
    }

    public function maintenance(){
        return $this->hasMany(VehicleMaintenance::class);
    }

    public function purchases()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}

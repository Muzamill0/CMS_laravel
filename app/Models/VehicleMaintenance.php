<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMaintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'date',
        'type',
        'cost',
        'provider',
        'location',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

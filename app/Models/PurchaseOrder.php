<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'project_id',
        'vehicle_id',
        'product_name',
        'quantity',
        'price_per_unit',
        'total_cost',
        'date',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }
}

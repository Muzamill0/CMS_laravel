<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'product_id',
        'vehicle_id',
        'product_name',
        'quantity',
        'price_per_unit',
        'total_cost',
        'date',
    ];
}

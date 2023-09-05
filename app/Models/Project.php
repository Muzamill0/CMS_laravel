<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'title',
        'area',
        'project_code',
        'status'
    ];

    public function purchases()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

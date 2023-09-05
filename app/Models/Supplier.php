<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'mobile_no',
        'phone_no',
        'address',
        'ntn_no',
        'strn_no',
        'fax_no',
        'status'
    ];

    public function purchases()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}

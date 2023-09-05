<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_name',
        'email',
        'address',
        'mobile_no',
        'ph_no',
        'sales_tax_no',
        'ntn_no',
        'tag_line',
        'logo'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
        'status',
    ];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'designation_id',
        'joining_date',
        'father_name',
        'relationship_status',
        'qualification',
        'image',
        'salary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLevel2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'parent_id',
        'name',
        'status',
    ];

    public function level1()
    {
        return $this->belongsTo(AccountLevel1::class,'parent_id','id');
    }

    public function level3()
    {
        return $this->hasMany(AccountLevel3::class,'parent_id','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'acc_level_1', 'id');
    }
}

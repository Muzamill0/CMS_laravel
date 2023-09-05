<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLevel4 extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'parent_id',
        'name',
        'opening_balance',
        'balance',
        'status',
        'opening_balance_id',
    ];

    public function level3()
    {
        return $this->belongsTo(AccountLevel3::class,'parent_id','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'acc_level_1', 'id');
    }
}

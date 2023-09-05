<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLevel3 extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'parent_id',
        'name',
        'status',
    ];

    public function level2()
    {
        return $this->belongsTo(AccountLevel2::class,'parent_id','id');
    }

    public function level4()
    {
        return $this->hasMany(AccountLevel4::class,'parent_id','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'acc_level_1', 'id');
    }
}

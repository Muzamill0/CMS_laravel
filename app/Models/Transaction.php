<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_no',
        'date',
        'amount',
        'type',
        'acc_level_1',
        'acc_level_2',
        'acc_level_3',
        'acc_level_4',
        'status',
        'description',
    ];

    public function level1()
    {
        return $this->belongsTo(AccountLevel1::class,'parent_id','id');
    }

    public function level2()
    {
        return $this->belongsTo(AccountLevel2::class,'parent_id','id');
    }

    public function level3()
    {
        return $this->belongsTo(AccountLevel3::class,'parent_id','id');
    }

    public function level4()
    {
        return $this->belongsTo(AccountLevel4::class,'parent_id','id');
    }
}


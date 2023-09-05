<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLevel1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'start_code',
        'end_code',
    ];


    public function level2()
    {
        return $this->hasMany(AccountLevel2::class, 'parent_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'acc_level_1', 'id');
    }
}

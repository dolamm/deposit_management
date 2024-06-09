<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
// table = ls_taikhoan

class AccountHistory extends Model
{
    // table = ls_taikhoan
    public $table = 'ls_taikhoan';
    use HasFactory;
    const TYPE_DEPOSIT = 'deposit';
    const TYPE_WITHDRAW = 'withdraw';
    protected $fillable = [
        'account_number',
        'type',
        'amount',
        'old_balance',
        'new_balance',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'account_number', 'phone');
    }
}

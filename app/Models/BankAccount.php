<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    public $table = 'tk_nganhang';
    protected $fillable = ['balance'];

    public function user()
    {
        return $this->hasOne(User::class, 'account_number', 'phone');
    }
    
    public function accountHistory()
    {
        return $this->hasMany(AccountHistory::class, 'account_number', 'account_number');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $fillable = ['blance'];

    public function user()
    {
        return $this->hasOne(User::class, 'account_number', 'phone');
    }
    
    public function accountHistory()
    {
        return $this->hasMany(AccountHistory::class, 'account_number', 'account_number');
    }
}

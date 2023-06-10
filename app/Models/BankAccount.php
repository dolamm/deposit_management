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
        return $this->belongsTo(User::class, 'account_number', 'phone');
    }
    public function getBlance()
    {
        return $this->blance;
    }
    public function updateBlance($amount)
    {
        $this->blance += $amount;
        $this->save();
    }
}

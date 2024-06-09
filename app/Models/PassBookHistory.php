<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PassBookHistory extends Model
{
    use HasFactory;
    protected $table = 'ls_sotietkiem';
    const CREATED_AT = 'ngaygiaodich';
    const UPDATED_AT = null;
    const WITHDRAW = 'withdraw';
    const DEPOSIT = 'deposit';
    const INTEREST = 'interest';
    protected $fillable = ['sotietkiem_id', 'sotien', 'soducu', 'sodumoi', 'loaigd', 'ghichu'];

    public function sotietkiem()
    {
        return $this->belongsTo(Sotietkiem::class, 'sotietkiem_id', 'id');
    }
}

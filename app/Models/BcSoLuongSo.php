<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BcSoLuongSo extends Model
{
    use HasFactory;
    protected $table = 'bc_soluongso';
    const CREATED_AT = 'ngaytao';
    const UPDATED_AT = null;
    protected $fillable = [
        'makyhan',
        'sl_somoi',
        'sl_sodong',
        'chenhlech',
    ];
}

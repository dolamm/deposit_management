<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LsKyhan extends Model
{
    use HasFactory;
    protected $table = 'ls_kyhan';
    protected $fillable = [
        'kyhan_id',
        'laisuatcu',
        'laisuatmoi',
    ];

    public function Kyhan()
    {
        return $this->belongsTo(KyHan::class, 'kyhan_id', 'id');
    }
}

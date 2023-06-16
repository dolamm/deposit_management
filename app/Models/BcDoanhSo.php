<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BcDoanhSo extends Model
{
    use HasFactory;
    protected $table = 'bc_doanhso';
    const CREATED_AT = 'ngaytao';
    const UPDATED_AT = null;
    protected $fillable = [
        'makyhan',
        'tongchi',
        'tongthu',
        'chenhlech',
        'ngaytao'
    ];

    public function Makyhan()
    {
        return $this->belongsTo(MaKyHan::class, 'makyhan', 'makyhan');
    }
}

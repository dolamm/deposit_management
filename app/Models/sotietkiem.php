<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
class Sotietkiem extends Model
{
    use HasFactory;
    protected $table = 'sotietkiem';
    const CREATED_AT = 'ngaymoso';
    const UPDATED_AT = 'ngaycapnhat';
    protected $fillable = ['thongtinkyhan', 'sotiengui', 'makyhan'];

    public function khachhang()
    {
        return $this->belongsTo(Users::class,'user_id','id');
    }

    public function kyhan()
    {
        return $this->belongsTo(Kyhan::class,'makyhan','makyhan');
    }
}

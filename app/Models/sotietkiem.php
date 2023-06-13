<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sotietkiem extends Model
{
    use HasFactory;
    protected $table = 'sotietkiem';
    const CREATED_AT = 'ngaymoso';
    const UPDATED_AT = null;
    protected $fillable = ['user_id','loaikyhan', 'ngaydaohan', 'sotiengui', 'sodu', 'tienlai', 'ngaydongso'];

    public function khachhang()
    {
        return $this->belongsTo('App\Models\Users');
    }

    public function loaikyhan()
    {
        return $this->belongsTo(Kyhan::class,'loaikyhan','makyhan');
    }
}

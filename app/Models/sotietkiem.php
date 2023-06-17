<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Casts\Json;
class Sotietkiem extends Model
{
    use HasFactory;
    protected $table = 'sotietkiem';
    const CREATED_AT = 'ngaymoso';
    const UPDATED_AT = 'ngaycapnhat';
    protected $fillable = ['thongtinkyhan', 'sotiengui', 'makyhan'];

    public function khachhang()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    protected $casts =[
        'thongtinkyhan' => Json::class,
    ];
    public function kyhan()
    {
        return $this->belongsTo(Kyhan::class,'makyhan','makyhan');
    }

    public function history(): HasMany
    {
        return $this->hasMany(PassBookHistory::class,'sotietkiem_id','id');
    }
}

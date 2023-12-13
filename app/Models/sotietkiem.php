<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Casts\Json;
use Carbon\Carbon;
class Sotietkiem extends Model
{
    use HasFactory;
    protected $table = 'sotietkiem';
    const CREATED_AT = 'ngaymoso';
    const UPDATED_AT = 'ngaycapnhat';
    protected $fillable = ['thongtinkyhan', 'sotiengui', 'makyhan', 'user_id'];

    const STATUS = [
        0 => 'Đã đóng sổ',
        1 => 'Đã đến hạn',
        2 => 'Chưa đến hạn',
    ];
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

    public function trangthai()
    {
        if($this->ngaydongso != null){
            return self::STATUS[0];
        }
        $ngaymoso = Carbon::parse($this->ngaymoso)->format('Y-m-d');
        $songay = $this->thongtinkyhan['thoigiannhanlai'];
        $currentDay = Carbon::now();
        if($currentDay->diffInDays($ngaymoso) >= $songay){
            return self::STATUS[1];
        }
        return self::STATUS[2];
    }

    public function cotherut()
    {
        $ngaytoithieu = Config::where('key', 'thoigianguitoithieu')->first();
        $ngaytoithieu = $ngaytoithieu->giatri;
        $ngaymoso = Carbon::parse($this->ngaymoso)->format('Y-m-d');
        $currentDay = Carbon::now();
        if($currentDay->diffInDays($ngaymoso) >= $ngaytoithieu && $this->trangthai() == self::STATUS[1]){
            return 1;
        }
        return 0;
    }
}

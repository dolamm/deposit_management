<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BcSoLuongSo;
use Carbon\Carbon;
use App\Models\Kyhan;
use App\Models\BcDoanhSo as BcDoanhSoModel;

class BcSLSoController extends Controller
{
    public function bcngay (){
        $label = Kyhan::all()->pluck('makyhan')->unique();
        $data = [];
        foreach($label as $key => $value){
            //soft data asc
            $data[$value] = BcSoLuongSo::where('makyhan', $value)->orderBy('ngaytao', 'asc')->get(['sl_somoi', 'sl_sodong', 'chenhlech', 'ngaytao']);
        }
        return response()->json($data);
    }
}

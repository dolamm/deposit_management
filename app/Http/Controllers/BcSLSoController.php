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
            $data[$value] = BcSoLuongSo::where('makyhan', $value)->orderBy('ngaytao', 'desc')->take(20)->get(['sl_somoi', 'sl_sodong', 'chenhlech', 'ngaytao']);
        }
        return response()->json($data);
    }

    public function bcthang(){
        $label = Kyhan::all()->pluck('makyhan')->unique();
        $data = [];
        foreach($label as $key => $value){
            //soft data asc
            $data[$value] = BcSoLuongSo::where('makyhan', $value)->orderBy('ngaytao', 'desc')->get(['sl_somoi', 'sl_sodong', 'chenhlech', 'ngaytao']);
            //group by month-year
            $data[$value] = $data[$value]->groupBy(function($date){
                return Carbon::parse($date->ngaytao)->format('m-Y');
            })
            ->map(function ($item) {
                return [
                    'sl_somoi' => $item->sum('sl_somoi'),
                    'sl_sodong' => $item->sum('sl_sodong'),
                    'chenhlech' => $item->sum('chenhlech'),
                ];
            })->take(18)->reverse();


        }
        return response()->json($data);
    }
}

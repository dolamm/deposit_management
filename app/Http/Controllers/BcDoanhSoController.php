<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BcDoanhSo as BcDoanhSoModel;
use Carbon\Carbon;
class BcDoanhSoController extends Controller
{
    public function bcngay(){
        $label = BcDoanhSoModel::all()->pluck('makyhan')->unique();
        $data = [];
        foreach($label as $key => $value){
            //soft data asc
            $data[$value] = BcDoanhSoModel::where('makyhan', $value)->orderBy('ngaytao', 'asc')->get(['tongchi', 'tongthu', 'ngaytao']);
            // foreach($data[$value] as $k => $v){
            //     $data[$value][$k]['ngaytao'] = Carbon::parse($v['ngaytao'])->format('d-m-Y');
            // }
        }
        return response()->json($data);
    }

    public function bcthang(){
        $label = BcDoanhSoModel::all()->pluck('makyhan')->unique();
        $data = [];
        foreach($label as $key => $value){
            //soft data asc
            $data[$value] = BcDoanhSoModel::where('makyhan', $value)->orderBy('ngaytao', 'asc')->get(['tongchi', 'tongthu', 'ngaytao']);
            // group by month and year and sum tongchi, tongthu
            $data[$value] = $data[$value]->groupBy(function($date) {
                return Carbon::parse($date->ngaytao)->format('m-Y');
            })->map(function ($item) {
                return [
                    'tongchi' => $item->sum('tongchi'),
                    'tongthu' => $item->sum('tongthu'),
                ];
            });
        }
        return response()->json($data);
    }
}   

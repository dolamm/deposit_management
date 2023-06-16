<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
class AccountController extends Controller
{
    public function BienDongSoDu(){
        $user = User::where('id', Auth::user()->id)->first();
        // get last 20 records order by created_at
        $data = $user->accountHistory()->orderBy('created_at', 'desc')->take(10)->get();
        // reserver data
        // format datetime
        foreach ($data as $key => $value) {
            $value->created_at = Carbon::parse($value->created_at)->format('d-m-Y H:i:s');
        }
        return response()->json($data);
    }
    
    public function TongTaiSan(){
        $user = User::where('id', Auth::user()->id)->first();
        // get last 20 records order by created_at
        $bank_balance = $user->bankAccount()->first()->balance;
        // reserver data
        // format datetime
        //sum of all sodu in sotietkiem
        $sotietkiem = $user->ListSotietkiem()->get();
        $sodu = 0;
        foreach ($sotietkiem as $key => $value) {
            $sodu += $value->sodu;
        }
        return response()->json(
            [
                'taikhoannganhang' => $bank_balance,
                'sotietkiem' => $sodu,
            ],
        );
    }
}

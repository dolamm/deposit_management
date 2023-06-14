<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function BienDongSoDu(){
        $user = User::where('id', Auth::user()->id)->first();
        $data = $user->accountHistory()->orderBy('id', 'desc')->get();
        return response()->json($data);
    }
    
}

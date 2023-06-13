<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\sotietkiem;
use App\Models\config;
use App\Models\kyhan;

class AddPassBook extends Component
{
    public Sotietkiem $passbook;

    public $uid ;

    public function mount($id){
        $this->passbook = new Sotietkiem();
        $this->listkyhan = Kyhan::all();
        $this->min = Config::find(2)->get('giatri');
        $this->passbook->user_id = $id;
    }

    protected $rules = [
        // 'passbook.loaikyhan' => 'required',
        'passbook.sotiengui' => 'required|numeric|min:1'
    ];

    public function Add(){

        // $validatedData = Validator::make(
        //     [
        //         'passbook.sotiengui'=>['numeric',Rule::greaterThan($this->min)]
        //     ]
        // );
        // if ($validatedData->fails()){
            
        // }
        $this->passbook->save();
        $this->passbook= new Sotietkiem();
    }

    public function render()
    {
        return view('livewire.add-pass-book')->extends('layouts.admin')->section('content');
    }
}

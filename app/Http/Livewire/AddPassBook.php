<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\sotietkiem;
use App\Models\config;
use App\Models\kyhan;

class AddPassBook extends Component
{
    public Sotietkiem $passbook;

    public $uid;
    public $id_kyhan;

    public function mount($id){
        $this->passbook = new Sotietkiem();
        $this->listkyhan = Kyhan::all();
        $this->min = Config::find(2)->get('giatri');
        $this->uid = $id;
    }

    protected $rules = [
        'passbook.loaikyhan' => 'required',
        'passbook.sotiengui' => 'required|numeric|min:1'
    ];

    public function Add(){
        $this->passbook->loaikyhan = Kyhan::find($this->id_kyhan);
        $this->passbook->user_id = $this->uid;
        $this->passbook->save();
        $this->passbook= new Sotietkiem();
    }

    public function render()
    {
        return view('livewire.add-pass-book')->extends('layouts.admin')->section('content');
    }
}

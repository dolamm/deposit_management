<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\sotietkiem;
use App\Models\User;

class ListPassBook extends Component
{
    public $passbook;
    const route = [
        'name' => "list-passbook",
        'component' => 'list-pass-book',
        'route' => '/list-pass-book',
    ];
    const permission = [
        'list-passbook'=>[
            'name'=>'list-passbook',
            'description'=>'Danh sách sổ tiết kiệm',
            'title' => 'Danh sách sổ tiết kiệm',
            'permission' =>['admin', 'officer'],
        ],
    ];
    public function mount(){
          
        $this->passbook = sotietkiem::all();

    }

    public function render()
    {
        return view('livewire.list-pass-book');
    }
}
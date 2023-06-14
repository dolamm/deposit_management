<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\sotietkiem;
use App\Models\User;

class ListPassBook extends Component
{
    public $passbook;

    public function mount(){
        $this->passbook = sotietkiem::all();
    }

    public function render()
    {
        return view('livewire.list-pass-book');
    }
}

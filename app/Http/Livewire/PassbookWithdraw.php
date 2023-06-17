<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sotietkiem;
class PassbookWithdraw extends Component
{
    public $sotietkiem;
    public function mount(Sotietkiem $sotietkiem){

    }
    
    public function render()
    {
        return view('livewire.passbook-withdraw');
    }
}

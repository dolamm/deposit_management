<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\sotietkiem;

class Personal extends Component
{
    public $personal;

    public function mount(){
        $userId = Auth::id();
        $this->personal = Sotietkiem::where('user_id', $userId)->get();
    }

    public function render()
    {
        return view('livewire.personal');
    }
}

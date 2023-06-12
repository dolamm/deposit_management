<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class MoSoTietKiem extends Component
{
    public $user;
    public $searchTerm;
    public function mount()
    {
        $this->user = User::all();
    }
    
    public function searchUser()
    {
        //phone or cmnd/cccd or fullname
        $this->user = User::where('phone', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('cmnd/cccd', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('fullname', 'like', '%' . $this->searchTerm . '%')
            ->get();
    }


    public function render()
    {
        return view('livewire.mo-so-tiet-kiem');
    }
}

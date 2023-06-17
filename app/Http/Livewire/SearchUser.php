<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
class SearchUser extends Component
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
            ->orWhere('fullname', 'like', '%' . $this->searchTerm . '%')
            // ->orWhere('cmnd_cccd','like','%' . Crypt::encryptString($this->searchTerm) . '%')
            ->get();
    }


    public function render()
    {
        return view('livewire.search-user');
    }
}

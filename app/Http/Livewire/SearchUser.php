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
    const permission = [
        'search-user' =>[
            'name' => 'search-user',
            'description' => 'Tìm kiếm người dùng',
            'title' => 'Tìm kiếm người dùng',
            'permission' => ['admin','officer'],
        ],
    ];
    public function searchUser()
    {
        //phone or cmnd/cccd or fullname
        $this->user = User::where('phone', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('fullname', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('cmnd_cccd','like','%' . $this->searchTerm . '%')
            ->get();
    }


    public function render()
    {
        return view('livewire.search-user');
    }
}

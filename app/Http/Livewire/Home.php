<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\BankAccount;
use Auth;
use Carbon\Carbon;
class Home extends Component
{
    public $user;
    public $edituser;
    const route = [
        'component' => 'home',
        'route' => '/home',
        'name' => 'home',
    ];
    public function mount()
    {
        $this->user = Auth::user();
        $this->edituser = $this->user->toArray();
    }

    public function updateUser()
    {
        $this->user->update($this->edituser);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Cập nhật thông tin cá nhân thành công!',
        ]);
    }

    public function render()
    {
        return view('livewire.home');
    }
}

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
    const route = [
        'component' => 'home',
        'route' => '/home',
        'name' => 'home',
    ];
    public function mount()
    {
        $this->user = User::find(Auth::user()->id);
    }
    public function render()
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Welcome to Laravel 8 Livewire CRUD Tutorial']);
        return view('livewire.home');
    }
}

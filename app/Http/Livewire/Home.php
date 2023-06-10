<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;
class Home extends Component
{
    public $user;
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

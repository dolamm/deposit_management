<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Welcome to Laravel 8 Livewire CRUD Tutorial']);
        return view('livewire.home');
    }
}

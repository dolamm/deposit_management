<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\sotietkiem;
use App\Models\User;
class UserPassbook extends Component
{
    public $listpassbook;
    public $user;
    protected $listeners = [
        // mount with user id
        'refreshPassbook' =>'refresh'
    ];

    public function mount($id){
        $this->user = User::find($id);
        $this->listpassbook = $this->user->passBook;
    }

    public function refresh (){
        $this->listpassbook = $this->user->passBook;
    }

    public function render()
    {
        return view('livewire.user-passbook')->extends('layouts.admin')->section('content');
    }
}

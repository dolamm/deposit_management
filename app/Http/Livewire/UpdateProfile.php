<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class UpdateProfile extends Component
{
    public User $user;
    const permission = [
        'update-user-profile'=>[
            'name'=>'update-user-profile',
            'description'=>'Cập nhật thông tin cá nhân',
            'title' => 'Cập nhật thông tin cá nhân',
            'role' =>['admin', 'officer'],
        ],
    ];
    public function mount($id){
        $this->user = User::find($id);
    }
    public function render()
    {
        return view('livewire.update-profile')->extends('layouts.admin')->section('content');
    }
}

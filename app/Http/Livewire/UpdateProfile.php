<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UpdateProfile extends Component
{
    public User $user;
    public $edituser;
    const permission = [
        'update-user-profile' => [
            'name' => 'update-user-profile',
            'description' => 'Cập nhật thông tin cá nhân',
            'title' => 'Cập nhật thông tin cá nhân',
            'permission' => ['admin', 'officer'],
        ],
    ];
    public function mount($id)
    {
        if (Gate::allows('update-user-profile') || Gate::allows('is_auth_user', $id)) {
            $this->user = User::find($id);
            $this->edituser = $this->user->toArray();
        }
        else {
            return abort(403, 'Bạn không có quyền xem trang!');
        }
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
        return view('livewire.update-profile')->extends('layouts.admin')->section('content');
    }
}

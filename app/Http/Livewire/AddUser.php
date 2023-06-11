<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
class AddUser extends Component
{
    public User $user;
    public $listRole;
    public function mount(){
        $this->user = new User();
        $this->listRole = Role::all();
    }
    protected $rules = [
        'user.fullname' => 'required',
        'user.phone' => 'required|unique:users,phone',
        'user.password' => 'required|min:6',
        'user.role_id' => 'required',
    ];
    protected $messages = [
        'user.*.required' => 'Phải điền đầy đủ thông tin',
    ];
    public function render()
    {
        return view('livewire.listuser.add-user');
    }

    public function addUser(){
        $this->validate();
        $this->user->password = bcrypt($this->user->password);
        $this->user->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thêm thành công!']);
        $this->user = new User();
    }
}

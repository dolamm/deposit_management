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
        'user.email' => 'required|email|unique:users,email',
        'user.role_id' => 'required',
        'user.address' => 'required',
        'user.cmnd_cccd' => 'required|unique:users,cmnd_cccd',
        'user.birthday' => 'required',

    ];
    protected $messages = [
        'user.*.required' => 'Phải điền đầy đủ thông tin',
        'user.phone.unique' => 'Số điện thoại đã tồn tại',
        'user.email.unique' => 'Email đã tồn tại',
        'user.cmnd_cccd.unique' => 'Số CMND/CCCD đã tồn tại',
        'user.email.email' => 'Email không đúng định dạng',
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

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
class AddUser extends Component
{
    public User $user;
    public $listRole;
    const permission =[
        'add-user' => [
            'title' => 'Thêm người dùng',
            'description' => 'Thêm người dùng',
            'name' => 'add-user',
            'permission' => ['admin', 'officer'],
        ],
    ];
    const route = [
        'component' => 'add-user',
        'route' => '/add-user',
        'name' => 'add-user',
    ];
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
        if(Gate::allows('add-user')){
            $this->validate();
            $this->user->password = bcrypt($this->user->password);
            $this->user->save();
            $this->user = new User();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thêm thành công!']);
        }
        else{
            $this->dispatchBrowserEvent('alert', ['type' => 'warning',  'message' => 'Bạn không có quyền thêm người dùng mới!']);
        }
    }
}

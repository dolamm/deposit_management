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
        'user.phone' => 'required:numeric|unique:users,phone',
        'user.email' => 'required|email|unique:users,email',
        'user.role_id' => 'required',
        'user.address' => 'required',
        'user.cmnd_cccd' => 'required|numeric|unique:users,cmnd_cccd',
        'user.birthday' => 'required',

    ];
    protected $messages = [
        'user.*.required' => 'Phải điền đầy đủ thông tin',
        'user.phone.unique' => 'Số điện thoại đã tồn tại',
        'user.email.unique' => 'Email đã tồn tại',
        'user.cmnd_cccd.unique' => 'Số CMND/CCCD đã tồn tại',
        'user.email.email' => 'Email không đúng định dạng',
        'user.phone.numeric' => 'Số điện thoại phải là số',
        'user.cmnd_cccd.numeric' => 'Số CMND/CCCD phai là số',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

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

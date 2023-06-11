<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use function PHPSTORM_META\type;

class ListUser extends Component
{
    const route = [
        'component' => 'list-user',
        'route' => '/list-user',
        'name' => 'list-user',
    ];
    const permission = [
        'create-user' =>[
            'title' => 'Thêm người dùng',
            'description' => 'Thêm người dùng',
            'name' => 'create-user',
            'permission' => ['admin', 'officer'],
        ],
        'update-user-role' => [
            'title' => 'Cập nhật vai trò người dùng',
            'description' => 'Cập nhật vai trò người dùng',
            'name' => 'update-user-role',
            'permission' => ['admin', 'officer'],
        ],
        'delete-user' => [
            'title' => 'Xóa người dùng',
            'description' => 'Xóa người dùng',
            'name' => 'delete-user',
            'permission' => ['admin'],
        ],
    ];
    public $listUser;
    public $listRole;
    public $currentRole;
    public function mount()
    {
        $this->listRole = Role::all();
        $this->listUser = User::where('role_id', 3)->get();
        $this->currentRole = 3;
    }

    public function render()
    {
        return view('livewire.listuser.list-user');
    }

    public function changeRole($role_id)
    {
        $this->currentRole = $role_id;
        $this->listUser = User::where('role_id', $role_id)->get();
    }

    public function updateUserRole($user_id, $role_id)
    {
        if (Gate::allows('update-user-role')) {
            $user = User::find($user_id);
            $user->role_id = $role_id;
            $user->save();
            $this->listUser = User::where('role_id', $this->currentRole)->get();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Cập nhật thành công!']);
        } else {
            $this->dispatchBrowserEvent('alert', ['type' => 'warning', 'message' => 'Bạn không có quyền cập nhật!']);
        }
    }

    public function deleteUser($user_id)
    {
        if (Gate::allows('delete-user')) {
            $user = User::find($user_id);
            $user->delete();
            $this->listUser = User::where('role_id', $this->currentRole)->get();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Xóa thành công!']);
        } else {
            $this->dispatchBrowserEvent('alert', ['type' => 'warning', 'message' => 'Bạn không có quyền xóa!']);
        }
    }
}

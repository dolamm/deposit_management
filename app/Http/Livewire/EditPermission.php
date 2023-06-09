<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class EditPermission extends Component
{
    const route = [
        'component' => 'edit-permission',
        'route' => '/edit-permission',
        'name' => 'edit-permission',
    ];
    const permission = [
        'view' => [
            'title' => 'Xem quyền',
            'description' => 'Xem quyền của vai trò',
            'name' => 'view-permission',
            'permission' => ['admin', 'officer'],
        ],
        'edit-permission' => [
            'title' => 'Cập nhật quyền',
            'description' => 'Cập nhật quyền cho vai trò',
            'name' => 'edit-permission',
            'permission' => ['admin'],
        ],
    ];
    public $permission;
    public $role;
    public function mount()
    {
        $this->role = Role::all();
        $this->permission = Permission::all();
    }
    public function render()
    {
        if(Gate::allows('view-permission')){
            return view('livewire.admin.edit-permission');
        }
        else{
            return view('errors.not_permission');
        }
    }

    public function updatePermission($role_id, $permission_id)
    {
        if (Gate::allows('edit-permission')) {
            $role = Role::find($role_id);
            $permission = Permission::find($permission_id);
            if ($role->hasPermission($permission->name)) {
                $role->permissions()->detach($permission->id);
            } else {
                $role->permissions()->attach($permission->id);
            }
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật thành công!']);
        }
        else{
            $this->dispatchBrowserEvent('alert', ['type' => 'warning',  'message' => 'Bạn không có quyền cập nhật!']);
        }
    }
}

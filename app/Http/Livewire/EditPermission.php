<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
class EditPermission extends Component
{
    const route = [
        'component' => 'edit-permission',
        'route' => '/edit-permission',
        'name' => 'edit-permission',
    ];
    const permission = [
        'edit-permission' =>[
            'title' => 'Cập nhật quyền',
            'description' => 'Cập nhật quyền cho vai trò',
            'name' => 'edit-permission',
            'permission' => ['admin'],
        ],
    ];
    public $permission;
    public $role;
    public function mount(){
        $this->role = Role::all();
        $this->permission = Permission::all();
    }
    public function render()
    {
        return view('livewire.admin.edit-permission');
    }

    public function updatePermission($role_id, $permission_id){
        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);
        if($role->hasPermission($permission->name)){
            $role->permissions()->detach($permission->id);
        }else{
            $role->permissions()->attach($permission->id);
        }
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật thành công!']);
    }
}

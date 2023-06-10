<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
class EditPermission extends Component
{
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

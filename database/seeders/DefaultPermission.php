<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;

class DefaultPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('permission');
        foreach ($data as $key => $item) {
            foreach ($item as $per){
                Permission::create([
                    'name' => $per['name'],
                    'description' => $per['description'],
                    'title' => $per['title'],
                ]);
                foreach ($per['permission'] as $role){
                    $role = Role::where('name', $role)->first();
                    $permission = Permission::where('name', $per['name'])->first();
                    RolePermission::create([
                        'role_id' => $role->id,
                        'permission_id' => $permission->id,
                    ]);
                }
            }
        }
    }
}

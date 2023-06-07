<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\Role;

class UpdatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cmd:update-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update cac quyen moi vao database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $data = config('permission');
        foreach ($data as $key => $item) {
            //check permission exist
            $permission = Permission::where('name', $item['name'])->first();
            if (empty($permission)) {
                $permission = new Permission();
                $permission->name = $item['name'];
                $permission->title = $item['title'];
                $permission->description = $item['description'];
                $permission->save();
                foreach ($item['permission'] as $value) {
                    //get role id
                    $role = Role::where('name', $value)->first();
                    //get permission id
                    $permission = Permission::where('name', $item['name'])->first();
                    //create role permission
                    $rolePermission = new RolePermission();
                    $rolePermission->role_id = $role->id;
                    $rolePermission->permission_id = $permission->id;
                    $rolePermission->save();
                }
            }
        }
    }
}

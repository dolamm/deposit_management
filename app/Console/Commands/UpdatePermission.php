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
            foreach ($item as $per) {
                //check if permission exist
                $permission = Permission::where('name', $per['name'])->first();
                if (empty($permission)) {
                    Permission::create([
                        'name' => $per['name'],
                        'description' => $per['description'],
                        'title' => $per['title'],
                    ]);
                    foreach ($per['permission'] as $role) {
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
}

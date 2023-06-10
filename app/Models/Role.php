<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'title'];
    const master_permission = 'administrator';
    const permission = [
        'administrator' =>[
            'title' => 'Quản trị viên',
            'description' => 'Có quyền truy cập vào tất cả các chức năng',
            'name' => self::master_permission,
            'permission' => ['admin'],
        ],
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function hasPermission($permission)
    {
        return $this->permissions()->where('name', $permission)->first() ? true : false;
    }
}

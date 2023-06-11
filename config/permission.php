<?php 
use App\Http\Livewire\SysConfig;
use App\Http\Livewire\ListUser;
use App\Models\Role;
use App\Http\Livewire\EditPermission;
    /*
    thiet lap quyen nguoi dung trong he thong
    default: 
        - maquyen: 'default'
        - ten: 'default'
        - mota: 'default'
    */
    return [
        1 => Role::permission,
        2 => SysConfig::permission,
        3 => ListUser::permission,
        4 => EditPermission::permission,
    ];
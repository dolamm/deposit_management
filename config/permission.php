<?php 
use App\Http\Livewire\SysConfig;
use App\Http\Livewire\ListUser;
use App\Models\Role;
use App\Http\Livewire\EditPermission;
use App\Http\Livewire\AddUser;
use App\Http\Livewire\UpdateProfile;
use App\Http\Livewire\KyhanManager;
use App\Http\Livewire\BcDoanhSo;
use App\Http\Livewire\SearchUser;
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
        5 => AddUser::permission,
        6 => UpdateProfile::permission,
        7 => KyhanManager::permission,
        8 => BcDoanhSo::permission,
        9 => SearchUser::permission,
    ];
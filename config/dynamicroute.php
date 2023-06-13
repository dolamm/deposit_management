<?php 
use App\Http\Livewire\SysConfig;
use App\Http\Livewire\ListUser;
use App\Http\Livewire\EditPermission;
use App\Http\Livewire\Home;
use App\Http\Livewire\BcDoanhSo;

return [
    1 => Home::route,
    2 => SysConfig::route,
    3 => ListUser::route,
    4 => EditPermission::route,
    5 => BcDoanhSo::route,
];
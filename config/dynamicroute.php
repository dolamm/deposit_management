<?php 
use App\Http\Livewire\SysConfig;
use App\Http\Livewire\ListUser;
use App\Http\Livewire\EditPermission;
use App\Http\Livewire\Home;
use App\Http\Livewire\BcDoanhSo;
use App\Http\Livewire\AddUser;
use App\Http\Livewire\BcSlSo;
use App\Http\Livewire\ListPassBook;
use App\Http\Livewire\KyhanManager;
use App\Http\Livewire\UserNotification;
use App\Http\Livewire\ChatRoom;
return [
    1 => Home::route,
    2 => SysConfig::route,
    3 => ListUser::route,
    4 => EditPermission::route,
    5 => BcDoanhSo::route,
    6 => AddUser::route,
    7 => BcSlSo::route,
    8 => ListPassBook::route,
    9 => KyhanManager::route,
    10 => UserNotification::route,
    11 => ChatRoom::route,
];
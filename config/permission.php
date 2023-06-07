<?php 
use App\Http\Livewire\SysConfig;
use App\Http\Livewire\ListUser;
    /*
    thiet lap quyen nguoi dung trong he thong
    default: 
        - maquyen: 'default'
        - ten: 'default'
        - mota: 'default'
    */
    return [
        1 => SysConfig::permission,
        2 => ListUser::permission,
    ];
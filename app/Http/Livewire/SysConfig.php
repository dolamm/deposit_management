<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Config;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\User;
use App\Http\Livewire\Notification;
class SysConfig extends Component
{
    const permission = [
        'view' => [
            'name' => 'sys-config',
            'title' => 'Xem cấu hình hệ thống',
            'description' => 'Xem cấu hình hệ thống',
            'permission' => ['admin', 'officer'],
        ],
        'update' => [
            'name' => 'sys-config-update',
            'title' => 'Cập nhật cấu hình hệ thống',
            'description' => 'Cập nhật cấu hình hệ thống',
            'permission' => ['admin'],
        ],
    ];
    public $config;
    public $value;

    public function render()
    {
        if (Gate::allows('sys-config')) {
            return view('livewire.admin.sys-config');
        } else {
            return view('errors.not_permission');
        }
    }
    public function mount()
    {
        $this->config = Config::all();
    }

    protected $rule = [
        'value.*.giatri' => 'required|float|min:0',
    ];

    protected $messge = [
        'value.*.giatri.required' => 'Gia tri khong duoc de trong',
        'value.*.giatri.float' => 'Gia tri phai la so',
        'value.*.giatri.min' => 'Gia tri phai lon hon 0',
    ];
    public function update($key)
    {
        if (Gate::allows('sys-config-update')) {
            $value = $this->value[$key]['giatri'];
            $config = Config::where('key', $key)->first();
            $config->giatri = $value;
            $config->save();
            $this->mount();
        }
        else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "Bạn không có quyền cập nhật cấu hình hệ thống"]
            );
        }
    }
}

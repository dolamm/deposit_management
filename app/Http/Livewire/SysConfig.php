<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Config;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\User;
use App\Http\Livewire\Notification;
use Illuminate\Validation\Validator;

class SysConfig extends Component
{
    const route = [
        'component' => 'sys-config',
        'route' => '/sys-config',
        'name' => 'system-config',
    ];
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

    protected $rules = [
        //get config id = 3
        'value.*.giatri' => [
            'required',
            'numeric',
            'min:1',
        ],
    ];

    protected $messages = [
        'value.*.giatri.required' => 'Giá trị không được để trống',
        'value.*.giatri.min' => 'Giá trị không được nhỏ hơn 1',
        'value.*.giatri.numeric' => 'Giá trị phải là số',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function update($key)
    {
        if (Gate::allows('sys-config-update')) {
            $value = $this->value[$key]['giatri'];
            $config = Config::where('key', $key)->first();
            $config->giatri = $value;
            $config->save();
            $this->config = Config::all();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Cập nhật ' . $config->tengiatri . ' thành công!']);
        }
        else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "Bạn không có quyền cập nhật cấu hình hệ thống"]
            );
        }
    }
}

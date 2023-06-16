<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Models\kyhan;

class KyhanManager extends Component
{
    const permission = [
        'view' => [
            'name' => 'kyhan-view',
            'title' => 'Xem thông tin kỳ han',
            'description' => 'Xem thông tin kỳ hạn',
            'permission' => ['admin', 'officer'],
        ],
        'update' => [
            'name' => 'kyhan-update',
            'title' => 'Cập nhật kỳ hạn',
            'description' => 'Thay đổi thông tin kỳ hạn',
            'permission' => ['admin'],
        ],
    ];

    public $kyhan_all;

    public function mount(){
        $this->kyhan_all = kyhan::all();
    }

    protected $rule = [
        'value.*.giatri' => [
            'required',
            'numeric',
        ],
    ];

    protected $messages = [
        'value.*.giatri.required' => 'Giá trị không được để trống',
        'value.*.giatri.numeric' => 'Giá trị phải là số',
    ];

    public function edit_kyhan(){

    }

    public function add_kyhan(){

    }

    public function delete_kyhan(){

    }

    public function render()
    {
        if(Gate::allows('kyhan-view')){
            return view('livewire.kyhan-manager');
        }
        else{
            return view('errors.not_permission');
        }
    }
}

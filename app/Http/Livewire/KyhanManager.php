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
    public kyhan $new_kyhan;
    public $val;
    public $editMode = false;
    public $laisuat;
    public $thoigiannhanlai;

    public function mount(){
        $this->kyhan_all = kyhan::all();
        $this->new_kyhan = new kyhan();
    }

    protected $rules = [
        'val.*' => [
            'required',
            'numeric',
        ],
        'new_kyhan.makyhan' => 'required|unique:kyhan,makyhan',
        'new_kyhan.tenkyhan' => 'required|unique:kyhan,tenkyhan',
        'new_kyhan.laisuat' => 'required|numeric|min:0|max:100',
        'new_kyhan.thoigiannhanlai' => 'required|numeric',
    ];

    protected $messages = [
        'val.*.required' => 'Giá trị không được để trống',
        'val.*.numeric' => 'Giá trị phải là số',
        'new_kyhan.*.required' => 'Giá trị không được để trống',
        'new_kyhan.makyhan.unique' => 'Mã kỳ hạn đã tồn tại',
        'new_kyhan.tenkyhan.unique' => 'Tên kỳ hạn đã tồn tại',
        'new_kyhan.laisuat.min' => 'Giá trị phải lớn hơn 0',
        'new_kyhan.laisuat.max' => 'Giá trị không được lớn hơn 100',
        'new_kyhan.laisuat.numeric' => 'Giá trị phải là số',
        'new_kyhan.thoigiannhanlai.numeric' => 'Giá trị phải là số'
    ];

    public function edit_kyhan($key){
        if(Gate::allows('kyhan-update')){
            $this->editMode = true;
            $kyhan = kyhan::find($key);
            $kyhan->laisuat = $this->val['laisuat'];
            $kyhan->thoigiannhanlai = $this->val['thoigiannhanlai'];
            $kyhan->save();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => "Bạn đã thay đổi thông tin kỳ hạn thành công"]
            );
        }
        else{
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "Bạn không có quyền cập nhật cấu hình hệ thống"]
            );
        }
    }

    public function close_modal(){
        $this->editMode = false;
        $this->val = null;
        $this->laisuat = null;
        $this->thoigiannhanlai = null;
        $this->kyhan_all = kyhan::all();
    }

    public function add_kyhan(){
        if(Gate::allows('kyhan-update')){
            $this->validate();
            $this->new_kyhan->save();
            $this->new_kyhan = new kyhan();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thêm thành công!']);
        }
        else{
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "Bạn không có quyền cập nhật cấu hình hệ thống"]
            );
        }
    }

    public function delete_kyhan($key){
        if(Gate::allows('kyhan-update')){
            $val = kyhan::find($key);
            $val->delete();
        }
        else{
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "Bạn không có quyền cập nhật cấu hình hệ thống"]
            );
        }
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

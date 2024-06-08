<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Models\kyhan;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Collection;

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
    const route = [
        'name' => 'quanli-kyhan',
        'component' => 'kyhan-manager',
        'route' => '/kyhan-manager'
    ];
    const Period = [
        1,2, 7, 14, 30, 90, 180, 270, 365
    ];
    public function convertPeriod($period){
        $name = "";
        $temp = $period;
        switch($temp){
            case 1:
                $name = "không kỳ hạn";
                break;
            case $temp > 1 && $temp < 7:
                $name = $temp .' ' ."ngày"; 
                break;
            case $temp >= 7 && $temp < 30:
                $temp = $temp / 7;
                $name = $temp .' ' ."tuần";
                break;
            case $temp >= 30 && $temp < 365:
                $temp = $temp / 30;
                $name =$temp .' ' ."tháng";
                break;
            case $temp >= 365:
                $temp = $temp / 365;
                $name =$temp .' ' ."năm";
                break;
        };
        return [
            'value' => $period,
            'name' => $name
        ];
    }
    public $kyhan_all;
    public kyhan $new_kyhan;
    public $val;
    public $laisuat;
    public $thoigiannhanlai;
    public $periodList;

    public function mount(){
        $this->kyhan_all = kyhan::all();
        $this->new_kyhan = new kyhan();
        $this->periodList = array_map(array($this, 'convertPeriod'), self::Period);

    }

    protected $rules = [
        'val.*.laisuat' => [
            'required',
            'numeric',
            'min:1.00',
            'max:100.00',
        ],
        'new_kyhan.makyhan' => 'required|unique:kyhan,makyhan',
        'new_kyhan.tenkyhan' => 'required',
        'new_kyhan.laisuat' => 'required|numeric|min:1.00|max:100.00',
        'new_kyhan.thoigiannhanlai' => 'required',
    ];

    protected $messages = [
        'val.*.*.required' => 'Giá trị không được để trống',
        'val.*.*.numeric' => 'Giá trị phải là số',
        'val.*.*.min' => 'Giá trị không được nhỏ hơn 1',
        'val.*.laisuat.max' => 'Giá trị không được lớn hơn 100',
        'new_kyhan.*.required' => 'Giá trị không được để trống',
        'new_kyhan.makyhan.unique' => 'Mã kỳ hạn đã tồn tại',
        'new_kyhan.laisuat.numeric' => 'Giá trị phải là số',
        'new_kyhan.laisuat.min' => 'Giá trị phải lớn hơn 0',
        'new_kyhan.laisuat.max' => 'Giá trị không được lớn hơn 100',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        
    }

    public function edit_kyhan($key){
        if(Gate::allows('kyhan-update')){
            $kyhan = kyhan::find($key);
            $kyhan->laisuat = $this->val[$key]['laisuat'];
            // $kyhan->thoigiannhanlai = $this->val[$key]['thoigiannhanlai'];
            $kyhan->save();
            $this->mount();
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
        $this->val = null;
        $this->laisuat = null;
        $this->thoigiannhanlai = null;
        $this->kyhan_all = kyhan::all();
    }

    public function add_kyhan(){
        if(Gate::allows('kyhan-update')){
            $this->validate();
            $this->new_kyhan->tenkyhan = $this->new_kyhan->tenkyhan . ' - ' . $this->convertPeriod($this->new_kyhan->thoigiannhanlai)['name'];
            $this->new_kyhan->save();
            $this->new_kyhan = new kyhan();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thêm thành công!']);
            $this->mount();
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
            return view('livewire.kyhan-manager');
    }
}

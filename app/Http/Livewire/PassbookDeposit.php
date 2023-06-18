<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sotietkiem;
use App\Models\PassBookHistory;
use App\Models\Kyhan;
use App\Models\AccountHistory;
use App\Models\Config;
use Illuminate\Validation\Validator;
class PassbookDeposit extends Component
{
    public  Sotietkiem $sotietkiem;
    public $data;

    public function mount(Sotietkiem $sotietkiem){
        $this->sotietkiem = $sotietkiem;
        $this->data['hinhthuc'] = [
            '1' => 'Tiền mặt',
            '2' => 'Chuyển khoản',
        ];
    }

    protected $rules = [
        'data.deposit-money' => 'required|numeric',
        'data.hinhthucguitien' => 'required',
    ];
    protected $messages =[
        'data.*.required' => 'Không được để trống',
        'data.deposit-money.numeric' => 'Phải là số',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function deposit(){
        $minvalue = Config::find(2)->giatri;
        $this->withValidator(function (Validator $validator) use ($minvalue){
            $validator->after(function ($validator) use ($minvalue){
                if($this->data['deposit-money'] < $minvalue){
                    $validator->errors()->add('data.deposit-money', 'Số tiền phải lớn hơn '.$minvalue);
                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'message' => 'Số tiền phải lớn hơn '.$minvalue
                    ]);
                }
            });
        });
        $this->validate();
        if($this->sotietkiem->thongtinkyhan['giahan'] == 1){
            PassBookHistory::create([
                'sotietkiem_id' => $this->sotietkiem->id,
                'sotien' => $this->data['deposit-money'],
                'loaigd' => PassBookHistory::DEPOSIT,
            ]);
        }
        else {
            $sotien_them = $this->data['deposit-money'];
            PassBookHistory::create([
                'sotietkiem_id' => $this->sotietkiem->id,
                'sotien' => $this->sotietkiem->sodu,
                'loaigd' => PassBookHistory::WITHDRAW,
                'ghichu' => 'Làm mới sổ tiết kiệm'
            ]);
            $new_id = Sotietkiem::create([
                'user_id' => $this->sotietkiem->user_id,
                'makyhan' => $this->sotietkiem->makyhan,
                'sotiengui' => $this->sotietkiem->sodu,
                'thongtinkyhan' => $this->sotietkiem->thongtinkyhan,
            ]);

            PassBookHistory::create([
                'sotietkiem_id' => $new_id,
                'sotien' => $sotien_them,
                'loaigd' => PassBookHistory::DEPOSIT,
                'ghichu' => 'Thêm số tiền vào sổ tiết kiệm'
            ]);
        }
        if($this->data['hinhthucguitien'] == 2){
            AccountHistory::create([
                'account_number' => $this->sotietkiem->khachhang->phone,
                'amount' => $this->data['deposit-money'],
                'type' => AccountHistory::TYPE_WITHDRAW,
                'description' => 'Gửi tiền vào sổ tiết kiệm '.$this->sotietkiem->id,
            ]);
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Gửi tiền thành công',
        ]);
    }

    public function render()
    {
        return view('livewire.components.passbook.passbook-deposit');
    }

}

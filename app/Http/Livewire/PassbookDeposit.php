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
        'data.money' => 'required|numeric',
        'data.hinhthucguitien' => 'required',
    ];
    protected $messages =[
        'data.*.required' => 'Không được để trống',
        'data.money.numeric' => 'Phải là số',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function deposit(){
        $minvalue = Config::find(2)->giatri;
        $this->withValidator(function (Validator $validator) use ($minvalue){
            $validator->after(function ($validator) use ($minvalue){
                if($this->data['money'] < $minvalue){
                    $validator->errors()->add('data.money', 'Số tiền phải lớn hơn '.$minvalue);
                }
            });
        });
        $this->validate();
        if($this->sotietkiem->thongtinkyhan['giahan'] == 1){
            PassBookHistory::create([
                'sotietkiem_id' => $this->sotietkiem->id,
                'sotien' => $this->data['money'],
                'loaigd' => PassBookHistory::DEPOSIT,
            ]);
        }
        else {
            $sotien_moi = $this->sotietkiem->sodu + $this->data['money'];
            PassBookHistory::create([
                'sotietkiem_id' => $this->sotietkiem->id,
                'sotien' => $this->passbook->sodu,
                'loaigd' => PassBookHistory::WITHDRAW,
                'ghichu' => 'Làm mới sổ tiết kiệm'
            ]);
            Sotietkiem::create([
                'user_id' => $this->sotietkiem->user_id,
                'makyhan' => $this->sotietkiem->makyhan,
                'sotiengui' => $sotien_moi,
                'thongtinkyhan' => $this->sotietkiem->thongtinkyhan,
            ]);
        }
        if($this->data['hinhthucguitien'] == 2){
            AccountHistory::create([
                'account_number' => $this->sotietkiem->user_id->phone,
                'sotien' => $this->data['money'],
                'loaigd' => AccountHistory::TYPE_WITHDRAW,
                'ghichu' => 'Gửi tiền vào sổ tiết kiệm '.$this->sotietkiem->id,
            ]);
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Gửi tiền thành công',
        ]);
    }

    public function render()
    {
        return view('livewire.passbook-deposit');
    }

}

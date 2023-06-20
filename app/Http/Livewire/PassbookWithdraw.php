<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sotietkiem;
use App\Models\AccountHistory;
use App\Models\PassbookHistory;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class PassbookWithdraw extends Component
{
    public Sotietkiem $sotietkiem;
    public $data;
    
    public function mount(Sotietkiem $sotietkiem){
        $this->sotietkiem = $sotietkiem;
        $this->data['hinhthuc'] = [
            '1' => 'Tiền mặt',
            '2' => 'Chuyển về tài khoản',
        ];
        $this->data['withdraw-money'] = $sotietkiem->sodu;
    }

    protected $rules = [
        'data.withdraw-money' => [
            'required',
            'numeric',
        ],
        'data.hinhthucruttien' => 'required',
    ];

    protected $message = [
        'data.withdraw-money.required' => 'Số tiền không được để trống',
        'data.withdraw-money.numeric' => 'Số tiền phải là số',
        'data.hinhthucruttien.required' => 'Hình thức rút tiền không được để trống',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function withdraw(){
        $money = $this->data['withdraw-money'];
        $this->withValidator(function (Validator $validator) use ($money){
            $validator->after(function ($validator) use ($money){
                if($money > $this->sotietkiem->sodu){
                    $validator->errors()->add('data.withdraw-money', 'Số tiền rút không được lớn hơn số dư');
                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'message' => 'Số tiền rút không được lớn hơn số dư',
                    ]);
                }
            });
        });
        $this->validate();
        PassbookHistory::create([
            'sotietkiem_id' => $this->sotietkiem->id,
            'sotien' => $money,
            'loaigd' => PassbookHistory::WITHDRAW,
        ]);
        if($this->data['hinhthucruttien'] == 2){
            AccountHistory::create([
                'account_number' => $this->sotietkiem->khachhang->phone,
                'amount' => $money,
                'type' => AccountHistory::TYPE_DEPOSIT,
                'description' => 'Rút tiền từ sổ tiết kiệm '.$this->sotietkiem->id,
            ]);
        }
        $this->emit('refreshPassbook');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Rút tiền thành công',
        ]);
    }

    public function render()
    {
        return view('livewire.components.passbook.passbook-withdraw');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sotietkiem;
use App\Models\AccountHistory;
use App\Models\PassBookHistory;
use App\Models\Kyhan;

class RenewPassbook extends Component
{
    public Sotietkiem $sotietkiem;
    public $data;
    public $kyhan;
    public function mount(Sotietkiem $sotietkiem)
    {
        $this->sotietkiem = $sotietkiem;
        $this->kyhan = Kyhan::all();
        $this->data['extraDeposit'] = [
            0 => "Không",
            1 => "Có",
        ];
        $this->data['hinhthuc'] = [
            1 => "Tiền mặt",
            2 => "Chuyển khoản",
        ];
        $this->data['extra']['deposit'] = 0;
        $this->data['extramoney'] = 0;
        $this->data['hinhthucguitien'] =1;
        $this->data['makyhan'] = $sotietkiem->makyhan;
    }
    protected $rules = [
        'data.extra.deposit' => 'required',
        'data.extramoney' => 'required|numeric',
        'data.hinhthucguitien' => 'required',

    ];
    protected $messages = [
        'data.*.required' => 'Không được để trống',
        'data.extramoney.numeric' => 'Số tiền phải là số',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function renew()
    {
        $user = $this->sotietkiem->khachhang;
        $newID = Sotietkiem::create([
            'user_id' => $user->id,
            'makyhan' => $this->data['makyhan'],
            'sotiengui' => $this->sotietkiem->sodu,
        ])->id; 
        PassbookHistory::create([
            'sotietkiem_id' => $this->sotietkiem->id,
            'sotien' => $this->sotietkiem->sodu,
            'loaigd' => PassbookHistory::WITHDRAW,
        ]);
        if ($this->data['extra']['deposit'] == 1) {
            $money = $this->data['extramoney'];
            if ($this->data['hinhthucguitien'] == 2) {
                AccountHistory::create([
                    'account_number' => $user->phone,
                    'amount' => $this->data['extramoney'],
                    'type' => AccountHistory::TYPE_WITHDRAW,
                    'description' => 'Gửi tiền vào sổ tiết kiệm ' . $newID,
                ]);
            }
            PassBookHistory::create([
                'sotietkiem_id' => $newID,
                'sotien' => $money,
                'loaigd' => PassBookHistory::DEPOSIT,
                'description' => 'nap them tien'
            ]);
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Gửi tiền vào sổ tiết kiệm thành công! ' .$newID,
        ]);
    }
    public function render()
    {
        return view('livewire.components.passbook.renew-passbook');
    }
}

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
    public Sotietkiem $renew;
    public function mount(Sotietkiem $sotietkiem)
    {
        $this->sotietkiem = $sotietkiem;
        $this->renew = new Sotietkiem();
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
    }
    protected $rules = [
        'data.extra.deposit' => 'required',
        'data.extramoney' => 'required|numeric',
        'data.hinhthucnaptien' => 'required',
        'renew.makyhan' => 'required',

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
        $money = $this->sotietkiem->sodu + $this->data['extramoney'];
        $user = $this->sotietkiem->khachhang;
        $this->renew->user_id = $user->id;
        $this->renew->sotiengui = $money;
        $this->renew->save();
        if ($this->data['extra']['deposit']) {
            if ($this->data['hinhthucnaptien'] == 2) {
                AccountHistory::create([
                    'account_number' => $user->phone,
                    'amount' => $this->data['extramoney'],
                    'type' => AccountHistory::TYPE_WITHDRAW,
                    'description' => 'Gửi tiền vào sổ tiết kiệm ' . $this->sotietkiem->id,
                ]);
            }
        }
        PassbookHistory::create([
            'sotietkiem_id' => $this->sotietkiem->id,
            'sotien' => $this->sotietkiem->sodu,
            'loaigd' => PassbookHistory::WITHDRAW,
        ]);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Gửi tiền vào sổ tiết kiệm thành công!'
        ]);
    }
    public function render()
    {
        return view('livewire.components.passbook.renew-passbook');
    }
}

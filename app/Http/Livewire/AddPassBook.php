<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\sotietkiem;
use App\Models\config;
use App\Models\kyhan;
use App\Models\User;
use App\Models\AccountHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Gate;
class AddPassBook extends Component
{
    public Sotietkiem $passbook;

    public $user;
    public $data;
    public $listkyhan;
    public function mount($id){
        if(Gate::allows('is_auth_user', $id) | Gate::allows('admin-officer')){
            $this->passbook = new Sotietkiem();
            $this->listkyhan = Kyhan::all();
            $this->user = User::find($id);
            $this->data['hinhthuc'] =[
                '1' => 'Tiền mặt',
                '2' => 'Chuyển khoản',
            ];
        }
        else{
            return abort(403, 'Bạn không có quyền truy cập vào trang này');
        }
    }

    protected $rules = [
        'passbook.sotiengui' => 'required|numeric',
        'passbook.makyhan' => 'required',
    ];
    protected $messages = [
        'passbook.*.required' => 'Không được để trống',
        'passbook.*.numeric' => 'Phải là số',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function Add(){
        $tienguitoithieu = config::where('id', 1)->get('giatri');
        $balance = $this->user->bankAccount->balance;
        $this->withValidator(function (Validator $validator) use ($tienguitoithieu, $balance){
            $validator->after(function ($validator) use ($tienguitoithieu, $balance){
                if($this->passbook->sotiengui < $tienguitoithieu[0]['giatri']){
                    $validator->errors()->add('passbook.sotiengui', 'Số tiền gửi tối thiểu là '.$tienguitoithieu[0]['giatri']);
                }
                if($this->data['hinhthucguitien'] == 2 && $this->passbook->sotiengui > $balance){
                    $validator->errors()->add('passbook.sotiengui', 'Số dư tài khoản không đủ');
                }
            });
        });
        $this->validate();
        $this->passbook->user_id = $this->user->id;
        if($this->data['hinhthucguitien'] == 2){
            AccountHistory::create([
                'account_number' => $this->user->bankAccount->account_number,
                'type' => AccountHistory::TYPE_WITHDRAW,
                'amount' => $this->passbook->sotiengui,
                'description' => 'Rút tiền gửi sổ tiết kiệm',
            ]);
        }
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thêm thành công']);
        $this->passbook->save();
        $this->passbook= new Sotietkiem();
    }

    public function render()
    {
        return view('livewire.add-pass-book')->extends('layouts.admin')->section('content');
    }
}

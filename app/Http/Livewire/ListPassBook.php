<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\sotietkiem;
use App\Models\User;
use App\Models\PassBookHistory;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
class ListPassBook extends Component
{
    public $listpassbook;
    public $status;
    public $searchTerm;
    public $data;

    const route = [
        'name' => "list-passbook",
        'component' => 'list-pass-book',
        'route' => '/list-pass-book',
    ];

    const permission = [
        'list-passbook'=>[
            'name'=>'list-passbook',
            'description'=>'Danh sách sổ tiết kiệm',
            'title' => 'Danh sách sổ tiết kiệm',
            'permission' =>['admin', 'officer'],
        ],
    ];
    public function mount(){
        $this->status = [];
        $this->listpassbook = sotietkiem::all();
    }

    public function search(){
        if($this->searchTerm != ""){
            $user_id = User::where('fullname', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('phone', 'like', '%'. $this->searchTerm.'%')
            // ->orWhere('cmnd_cccd', 'like', '%'. Crypt::encryptString($this->searchTerm).'%')
            ->pluck('id');
            $this->listpassbook = sotietkiem::whereIn('user_id', $user_id)->get();
        }else{
            $this->listpassbook = sotietkiem::all();
        }
    }

    public function naptien(Sotietkiem $sotietkiem){
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => $sotietkiem->sodu,
        ]);
    }

    public function render()
    {
        return view('livewire.list-pass-book');
    }
}
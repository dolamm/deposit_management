<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BcDoanhSo as BcDoanhSoModel;
use App\Models\Kyhan;
class BcDoanhSo extends Component
{
    public $kyhan;
    public $data;
    const route = [
        'component' => 'bc-doanh-so',
        'route' => '/bc-doanh-so',
        'name' => 'bcdoanhso',
    ];
    public function mount(){
        $this->kyhan = Kyhan::all();
        $this->data = BcDoanhSoModel::all()->sortByDesc('ngaytao');
    }

    
    public function render()
    {
        return view('livewire.bc-doanh-so');
    }
}

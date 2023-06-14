<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BcSlSo as BcSlSoModel;
use App\Models\Kyhan;
use Carbon\Carbon;
use App\Models\BcSoLuongSo;
class BcSlSo extends Component
{
    public $kyhan;
    public $bcngay;
    public $bcthang;
    public function mount(){
        $this->kyhan = Kyhan::all();
    }
    public function render()
    {
        return view('livewire.bc-sl-so');
    }
}

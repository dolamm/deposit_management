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
    const route =[
        'component'=>'bc-sl-so',
        'route' => '/bc-sl-so',
        'name' => 'bcslso'
    ];
    public function mount(){
        $this->kyhan = Kyhan::all();
        $this->bcngay = BcSoLuongSo::all()->sortByDesc('ngaytao');
        // group by thang-nam and by makyhan
        $this->bcthang = BcSoLuongSo::all()->sortByDesc('ngaytao')
        ->groupBy('makyhan')
        ->map(function ($item) {
            return $item->groupBy(function($date) {
                return Carbon::parse($date->ngaytao)->format('m-Y');
            })->map(function ($item) {
                return [
                    'sl_somoi' => $item->sum('sl_somoi'),
                    'sl_sodong' => $item->sum('sl_sodong'),
                    'chenhlech' => $item->sum('chenhlech'),
                ];
            });
        });
    }
    public function render()
    {
        return view('livewire.bc-sl-so');
    }
}

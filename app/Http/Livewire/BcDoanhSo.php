<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BcDoanhSo as BcDoanhSoModel;
use App\Models\Kyhan;
use Carbon\Carbon;
class BcDoanhSo extends Component
{
    public $kyhan;
    public $bcngay;
    public $bcthang;
    const route = [
        'component' => 'bc-doanh-so',
        'route' => '/bc-doanh-so',
        'name' => 'bcdoanhso',
    ];
    public function mount(){
        $this->kyhan = Kyhan::all();
        $this->bcngay = BcDoanhSoModel::all()->sortByDesc('ngaytao');
        $this->bcthang = BcDoanhSoModel::all()->sortByDesc('ngaytao')
        ->groupBy('makyhan')
        ->map(function ($item) {
            return $item->groupBy(function($date) {
                return Carbon::parse($date->ngaytao)->format('m-Y');
            })->map(function ($item) {
                return [
                    'tongchi' => $item->sum('tongchi'),
                    'tongthu' => $item->sum('tongthu'),
                ];
            });
        });
    }

    
    public function render()
    {
        return view('livewire.bc-doanh-so');
    }
}

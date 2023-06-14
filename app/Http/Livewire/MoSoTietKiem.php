<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\sotietkiem;
use App\Models\Config;

class MoSotietkiem extends Component
{
    public Sotietkiem $passbook;

    public function mount(){
        $this->passbook = new Sotietkiem();
        $this->listkyhan = Kyhan::all();
        $this->min = Config::find(2)->get('giatri');
    }

    protected $rules = [
        'passbook.loaikyhan' => 'required',
    ];

    public function AddPassBook(){

        $validatedData = Validator::make(
            [
                'sotiengui'=>['required','numeric',Rule::greaterThan($this->min)]
            ]
        );
        if ($validatedData->fails()){

        }
        $this->passbook->save();
        $this->passbook= new Sotietkiem();
    }

    public function render()
    {
        return view('livewire.mo-so-tietkiem');
    }
}

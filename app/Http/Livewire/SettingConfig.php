<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Config;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Auth;
class SettingConfig extends Component
{
    public function render()
    {
        if(Gate::allows('check-role-admin')){
            $config = Config::all();
            return view('livewire.admin.setting-config', compact('config'));
        }
        else{
            return view('errors.not_permisson');
        }
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\BankAccount;
use Auth;
use Carbon\Carbon;
class Home extends Component
{
    public $user;
    public $accountHistory;
    public $accountBlance;
    public function mount()
    {
        $this->user = User::find(Auth::user()->id);
        //get 10 lastest account history
        //get datecreate
        //get month and day
        $this->accountHistory = Auth::user()->bankAccount->accountHistory->sortByDesc('created_at')->take(20)->pluck('created_at')->map(function ($item, $key) {
            return Carbon::parse($item)->format('d-m-Y');
        });
        //get blance
        //get 10 lastest account history
        $this->accountBlance = Auth::user()->bankAccount->accountHistory->sortByDesc('created_at')->take(20)->pluck('new_balance');
    }
    public function render()
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Welcome to Laravel 8 Livewire CRUD Tutorial']);
        return view('livewire.home');
    }
}

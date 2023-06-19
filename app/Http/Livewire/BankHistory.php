<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class BankHistory extends Component
{
    public $history;
    public $user;
    public function mount($user)
    {
        $this->user = $user;
        $this->history = $user->accountHistory;
    }
    public function render()
    {
        return view('livewire.bank-history');
    }
}

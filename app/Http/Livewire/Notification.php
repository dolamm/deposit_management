<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.notification');
    }
    public function alertSuccess($messge)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => $messge]
        );
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertError($messge)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'error',  'message' => $messge]
        );
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertInfo($messge)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'info',  'message' => $messge]
        );
    }

    public function alertWarning($messge)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'warning',  'message' => $messge]
        );
    }
}

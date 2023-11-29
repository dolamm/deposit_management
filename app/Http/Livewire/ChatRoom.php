<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChatRoom as ChatRoomModel;
use App\Events\ChatRoomRefresh;
class ChatRoom extends Component
{
    public $new_message;
    public $user_id;
    public $list_messages;


    const route = [
        'component' => 'chat-room',
        'route' => '/chat-room',
        'name' => 'chat-room',
    ];

    protected $listeners = ['messageReceived' => 'refreshMessages'];

    public function mount(){
        $this->user_id = auth()->user()->id;
        $this->list_messages = ChatRoomModel::all();
    }
    
    public function refreshMessages(){
        $this->list_messages = ChatRoomModel::all();
    }

    public function render()
    {
        return view('livewire.chat-room');
    }

    public function sendMessage()
    {
        $this->validate([
            'new_message' => 'required|max:255'
        ]);
        $message = ChatRoomModel::create([
            'user_id' => $this->user_id,
            'message' => $this->new_message
        ]);
        $this->list_messages->push($message);
        event(new ChatRoomRefresh($message, auth()->user()));
        $this->new_message = '';
    }
}

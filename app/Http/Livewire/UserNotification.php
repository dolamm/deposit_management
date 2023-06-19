<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Notifications\Notification;
use App\Notifications\UserNotify;
use Auth;

class UserNotification extends Component
{
    public $user;
    public $sendNotify;
    public function mount()
    {
        $this->user = Auth::user();
        $this->sendNotify['group'] = [
            0 => 'Tất cả',
            1 => 'Quản trị viên',
            2 => 'Nhân viên',
            3 => 'Khách hàng',
        ];
        $this->sendNotify['group-user'] = 0;
        $this->sendNotify['message'] = '';
    }
    protected $rules = [
        'sendNotify.group-user' => 'required',
        'sendNotify.message' => 'required',
    ];
    protected $messages = [
        'sendNotify.group-user.required' => 'Bạn chưa chọn nhóm người nhận',
        'sendNotify.message.required' => 'Bạn chưa nhập nội dung',
    ];
    const route = [
        'component' => 'user-notification',
        'name' => 'user-notification',
        'route' => '/user-notification',
    ];


    public function deleteAll()
    {
        $this->user->notifications()->delete();
        $this->mount();
    }

    public function readAll()
    {
        $this->user->unreadNotifications->markAsRead();
        $this->mount();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function NotifiUser()
    {
        $users = User::all();
        if ($this->sendNotify['group-user'] != 0) {
            $users = User::where('role_id', $this->sendNotify['group-user'])->get();
        }

        // send notify 
        foreach ($users as $u) {
            $u->notify(new UserNotify('Quản trị viên', $this->sendNotify['message']));
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Gửi thông báo thành công'
        ]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.user-notification');
    }
}

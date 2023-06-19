<div class="container">
    <div class="row">
        <div class="col">
            <h1>Thông báo</h1>
        </div>
        <div class="col d-block">
            @can('admin-officer')
            <button type="button" class="btn btn-primary d-block float-end" data-bs-toggle="modal" data-bs-target="#send-notify">
                <i class="bi bi-send-plus-fill"></i> Gửi thông báo
            </button>
            @endcan
            <!-- mark as read all -->
            <button type="button" class="btn btn-primary d-block float-end" wire:click="readAll">
                <i class="bi bi-check-circle-fill"></i> Đánh dấu đã đọc
            </button>
            <!-- delete -->
            <!-- <button type="button" class="btn btn-primary d-block float-end" wire:click="deleteAll">
                <i class="bi bi-trash-fill"></i> Xóa tất cả
            </button> -->
        </div>
    </div>
    <table class="table h5">
        <tbody>
            @foreach ($user->notifications as $notification)
            <tr class="m-15">
                @switch($notification->data['type'])
                @case("user")
                <td>
                    <span class="badge rounded-pill bg-danger">Thông báo</span>
                    @if($notification->read_at == null)
                    <span class="badge rounded-pill bg-danger">Chưa đọc</span>
                    @endif
                </td>
                <td>
                    {{ $notification->data['message'] }}
                    <small class="badge rounded-pill bg-info text-white">{{$notification->data['author']}}</small>
                </td>
                @break
                @case("passbookHistory")
                @switch($notification->data['data']['loaigd'])
                @case("deposit")
                <td>
                    <span class="badge rounded-pill bg-success text-white">Nạp tiền</span>
                </td>
                <td>
                    Đã nạp thành công số tiền {{$notification->data['data']['sotien']}} vào sổ tiết kiệm #{{$notification->data['data']['sotietkiem_id']}}
                </td>
                @break
                @case("withdraw")
                <td>
                    <span class="badge rounded-pill bg-warning text-white">Rút tiền</span>
                </td>
                <td>
                    Đã rút thành công số tiền {{$notification->data['data']['sotien']}} vào sổ tiết kiệm #{{$notification->data['data']['sotietkiem_id']}}
                </td>
                @break
                @case("interest")
                <td>
                    <span class="badge rounded-pill bg-info text-white">Nhận lãi</span>
                </td>
                <td>
                    Đã nhận lãi {{$notification->data['data']['sotien']}} vào sổ tiết kiệm #{{$notification->data['data']['sotietkiem_id']}}
                </td>
                @break
                @endswitch
                @break
                @case('sotietkiem')
                <td>
                    <span class="badge rounded-pill bg-primary text-white">Sổ tiết kiệm</span>
                </td>
                <td>
                    {{$notification->data['message']}}
                </td>
                @break
                @endswitch
                <td>
                    <button wire:click="markAsRead({{$notification->id}})" class="btn btn-sm btn-success"><i class="bi bi-check2-all"></i></button>
                    <!-- <button wire:click="delete({{$notification->id}})" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon-fill"></i></button> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Notify Modal -->
    <div wire:ignore.self class="modal fade" id="send-notify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- input messgae -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nội dung thông báo</span>
                        <textarea wire:model="sendNotify.message" type="text" class="form-control" placeholder="Nội dung thông báo" aria-label="Username" aria-describedby="basic-addon1">
                        </textarea>
                    </div>
                    <!-- input group -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nhóm người nhận</span>
                        <select wire:model="sendNotify.group-user" class="form-select" aria-label="Default select example">
                            @foreach ($sendNotify['group'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" wire:click="NotifiUser" data-bs-dismiss="modal">Gửi thông báo</button>
                </div>
            </div>
        </div>
    </div>
</div>
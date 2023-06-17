<div>
    <div>
        <h1>Danh sách sổ tiết kiệm khách hàng {{$user->fullname}}</h1>
        <div class="input-group">
            <input type="search" wire:model="searchTerm" class="form-control rounded" placeholder="tìm kiếm người dùng" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary" wire:click="search">search</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Loại Tiết Kiệm</th>
                    <th scope="col">Khách Hàng</th>
                    <th scope="col">Lãi Suất</th>
                    <th scope="col">Số Dư</th>
                    <th scope="col">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listpassbook as $index => $item)
                <tr class=" @if ($item->trangthai() == 'Đã đến hạn') table-success
                    @elseif ($item->trangthai() == 'Đã đóng sổ') table-danger @endif">
                    <th scope="row">{{ $index }}</td>
                    <td>
                        {{$item->thongtinkyhan['tenkyhan']}}
                    </td>
                    <td>
                        {{$item->thongtinkyhan['laisuat']*100}}%
                    </td>
                    <td>
                        {{$item->khachhang->fullname}}
                    </td>
                    <td>{{ $item->sodu }}</td>
                    <td>
                        @switch($item->trangthai())
                        @case('Đã đến hạn')
                        <span class="badge bg-success">Đã đến hạn</span>
                        @break
                        @case('Đã đóng sổ')
                        <span class="badge bg-danger">Đã đóng sổ</span>
                        @break
                        @default
                        <span class="badge bg-primary">Đang hoạt động</span>
                        @endswitch
                    </td>
                    <td class="d-block justify-content-center">
                        @if ($item->trangthai() != 'Đã đóng sổ')
                        <button @if ($item->trangthai() != 'Đã đến hạn') disabled @endif type="button" class="btn btn-primary" wire:click="naptien({{$item}})">
                            <i class="bi bi-plus-circle-fill"></i>
                        </button>
                        <button @if (!$item->cotherut()) disabled @endif type="button" class="btn btn-success">
                            <i class="bi bi-arrow-bar-down"></i>
                        </button>
                        @endif
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#history-{{$item->id}}">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                        <!-- history -->
                        <div class="modal fade" id="history-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content modal-lg">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Loại giao dịch</th>
                                                    <th scope="col">Số tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($item->history as $index => $history)
                                                <tr>
                                                    <td>
                                                        {{$index}}
                                                    </td>
                                                    <td>
                                                        @switch($history->loaigd)
                                                        @case('deposit')
                                                        <span class="badge bg-success">Nạp tiền</span>
                                                        @break
                                                        @case('withdraw')
                                                        <span class="badge bg-danger">Rút tiền</span>
                                                        @break
                                                        @case('interest')
                                                        <span class="badge bg-primary">Tiền lãi</span>
                                                        @break
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        {{$history->sotien}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
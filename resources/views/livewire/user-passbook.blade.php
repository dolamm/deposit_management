<div>
    <div>
        <h1>Sổ tiết kiệm của {{$user->fullname}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Loại Tiết Kiệm</th>
                    <th scope="col">Lãi Suất</th>
                    <th scope="col">Khách Hàng</th>
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
                        {{$item->thongtinkyhan['laisuat']}}%
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
                        <button @if ($item->trangthai() != 'Đã đến hạn') disabled @endif type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#deposit-{{$item->id}}"
                            title="nạp thêm tiền" data-toggle="tooltip"
                            >
                            <i class="bi bi-plus-circle-fill"></i>
                        </button>
                        <button @if (!$item->cotherut()) disabled @endif type="button" class="btn btn-success"
                            data-bs-toggle="modal" data-bs-target="#withdraw-{{$item->id}}"
                            title="rút tiền" data-toggle="tooltip"
                            >
                            <i class="bi bi-arrow-bar-down"></i>
                        </button>
                        <button @if (!$item->cotherut()) disabled @endif type="button" class="btn btn-info"
                        data-bs-toggle="modal" data-bs-target="#renew-{{$item->id}}"
                        title="thay đổi kỳ hạn" data-toggle="tooltip">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                        @endif
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#history-{{$item->id}}"
                        title="lịch sử giao" data-toggle="tooltip"
                        >
                            <i class="bi bi-eye-fill"></i>
                        </button>
                        <!-- history -->
                        <div class="modal fade" id="history-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content modal-lg">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Lịch sử sổ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Loại giao dịch</th>
                                                    <th scope="col">Ngày thực hiện</th>
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
                                                        {{$history->ngaygiaodich}}
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
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Deposit Modal -->
                        <div class="modal fade" id="deposit-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nạp tiền</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- warining -->
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading">Chú ý!</h4>
                                            <p>Đối với các sổ không thuộc không kỳ hạn khi nạp thêm tiền sẽ tự động tạo sổ mới với cùng kỳ hạn</p>
                                        </div>
                                        <livewire:passbook-deposit :sotietkiem="$item" />
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Withdraw Modal -->
                        <div  wire:ignore.self class="modal fade" id="withdraw-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Rút tiền</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- warining -->
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading">Chú ý!</h4>
                                            <p>Đối với các sổ không phải không kỳ hạn sẽ tự động rút toàn bộ tiền</p>
                                        </div>
                                        <livewire:passbook-withdraw :sotietkiem="$item" />
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <!-- Renew Modal -->
                        <div  wire:ignore.self class="modal fade" id="renew-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thay đổi kỳ hạn</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- warining -->
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading">Chú ý!</h4>
                                            <p>Sẽ rút toàn bộ só dư sang kỳ hạn mới</p>
                                        </div>
                                        <livewire:renew-passbook :sotietkiem="$item" />
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
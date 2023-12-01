<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Danh Sách Kỳ Hạn</h1>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary d-block float-end" data-bs-toggle="modal" data-bs-target="#add-rule">
                    <i class="bi bi-file-earmark-ruled"></i> Thêm Kỳ Hạn
                </button>
            </div>
        </div>
        <div wire:ignore.self class="modal fade" id="add-rule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vui lòng nhập thông tin kỳ hạn</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="laisuat">Mã kỳ hạn<span class="text-danger">*</span></label>
                            <input wire:model="new_kyhan.makyhan" type="text" class="form-control" id="laisuat" placeholder="Nhập mã kỳ hạn">
                            @error('new_kyhan.makyhan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="laisuat">Tên kỳ hạn<span class="text-danger">*</span></label>
                            <input wire:model="new_kyhan.tenkyhan" type="text" class="form-control" id="laisuat" placeholder="Nhập tên kỳ hạn">
                            @error('new_kyhan.tenkyhan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="laisuat">Lãi suất kỳ hạn (%)<span class="text-danger">*</span></label>
                            <input wire:model="new_kyhan.laisuat" type="text" class="form-control" id="laisuat" placeholder="Nhập lãi suất">
                            @error('new_kyhan.laisuat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!-- <div class="form-group">
                            <label for="thoigiannhanlai">Thời gian nhận lãi (ngày)<span class="text-danger">*</span></label>
                            <input wire:model="new_kyhan.thoigiannhanlai" type="text" class="form-control" id="thoigiannhanlai" placeholder="Nhập thời gian nhận lãi">
                            @error('new_kyhan.thoigiannhanlai') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->
                        <div class="form-group">
                        <label for="thoigiannhanlai">Thời gian nhận lãi (ngày)<span class="text-danger">*</span></label>
                        <select class="form-select" id="thoigiannhanlai"
                            wire:model="new_kyhan.thoigiannhanlai"
                        >
                            <option disabled selected>Chọn thời gian nhận lãi</option>
                            @foreach($periodList as $period)
                            <option value="{{$period['value']}}">{{$period['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" @if($errors->any()) disabled @enderror class="btn btn-primary" wire:click="add_kyhan" data-bs-dismiss="modal">Lưu kỳ hạn</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($kyhan_all as $kyhan)
            <div class="col-sm-4 rounded border border-2 m-5 p-5">
                <p> Tên kỳ hạn : {{ $kyhan->tenkyhan }}</p>
                <p> Lãi suất kỳ hạn : {{ $kyhan->laisuat }}%</p>
                <p> Thời gian nhận lãi : {{ $kyhan->thoigiannhanlai }} ngày</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$kyhan->makyhan}}">Chỉnh sửa</button>
                <!-- wiremodel -->
                <div wire:ignore.self class="modal fade" id="edit{{$kyhan->makyhan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa chi tiết</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="laisuat">Lãi suất</label>
                                    <input wire:model="val.{{ $kyhan->id }}.laisuat" type="text" class="form-control" id="laisuat" placeholder="Nhập lãi suất">
                                    @error('val.'.$kyhan->id.'.laisuat') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- <div class="form-group">
                                    <label for="thoigiannhanlai">Thời gian nhận lãi (tháng)</label>
                                    <input wire:model="val.{{ $kyhan->id }}.thoigiannhanlai" type="text" class="form-control" id="thoigiannhanlai" placeholder="Nhập thời gian nhận lãi">
                                    @error('val.'.$kyhan->id. '.thoigiannhanlai') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close_modal">Đóng</button>
                                <button type="submit" @if($errors->any()) disabled @enderror class="btn btn-primary" wire:click="edit_kyhan({{ $kyhan->id }})">Lưu thay đổi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
<div>
    <div class="form-group">
        <label for="exampleInputEmail1">Có nạp thêm tiền</label>
        <select wire:model="data.extra.deposit" class="form-select" aria-label="Default select example">
            <option selected disabled>Nạp thêm tiền</option>
            @foreach($data['extraDeposit'] as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    @if($data['extra']['deposit'] == 1)
    <div class="form-group">
        <label for="exampleInputEmail1">Số tiền nạp thêm</label>
        <input wire:model="data.extramoney" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số tiền nạp thêm">
    </div>
    @error('data.extramoney')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="exampleInputEmail1">Hình thức nạp tiền</label>
        <select wire:model="data.hinhthucguitien" class="form-select" aria-label="Default select example">
            <option selected disabled>Hình thức</option>
            @foreach($data['hinhthuc'] as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    @error('data.hinhthucguitien')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Chọn kỳ hạn</label>
        <select wire:model="data.makyhan" class="form-select" aria-label="Default select example">
            <option selected disabled>chọn kỳ hạn</option>
            @foreach ($kyhan as $item)
            <option value="{{$item->makyhan}}">{{$item->tenkyhan}}</option>
            @endforeach
        </select>
    </div>
    @error('data.makyhan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" wire:click="renew" data-bs-dismiss="modal">Save changes</button>
    </div>
</div>
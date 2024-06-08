<div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash-stack"></i></span>
        <input wire:model="data.deposit-money" type="text" class="form-control" placeholder="số tiền cân nạp thêm" aria-label="money" aria-describedby="basic-addon1">
    </div>
    @error('data.deposit-money')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    <div>
        <select wire:model="data.hinhthucguitien" class="form-select" aria-label="Default select example">
            <option  selected>Chọn hình thức gửi tiền</option>
            @foreach ($data['hinhthuc'] as $key => $item)
            <option value="{{$key}}">{{$item}}</option>
            @endforeach
        </select>
    </div>
    @error('data.hinhthucguitien')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" wire:click="deposit" data-bs-dismiss="modal">Save changes</button>
    </div>
</div>

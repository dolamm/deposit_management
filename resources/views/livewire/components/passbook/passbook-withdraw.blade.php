<div>
    @if ($sotietkiem->thongtinkyhan['giahan'])
    <!-- so tien can rut -->
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash-stack"></i></span>
        <input wire:model="data.withdraw-money" type="text" class="form-control" placeholder="số tiền cần rút" aria-label="money" aria-describedby="basic-addon1">
    </div>
    @else
    <!-- toan bo so du -->
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash-stack"></i></span>
        <input  value="{{$sotietkiem->sodu}}" wire:model="data.withdraw-money" disabled type="text" class="form-control" placeholder="{{$sotietkiem->sodu}}" aria-label="money" aria-describedby="basic-addon1">
    </div>
    @endif
    @error('data.withdraw-money')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    <div>
        <select wire:model="data.hinhthucruttien" class="form-select" aria-label="Default select example">
            <option selected>Chọn hình thức rút tiền</option>
            @foreach ($data['hinhthuc'] as $key => $item)
            <option value="{{$key}}">{{$item}}</option>
            @endforeach
        </select>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary" wire:click="withdraw" data-bs-dismiss="modal">Save changes</button>
        </div>
    </div>
</div>
<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Số tiền gửi</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="passbook.sotiengui">
  </div>
  <!-- <div class="form-group">
        <label for="role">Loai ky han</label>
        <select class="form-select" aria-label="Default select example" wire:model="passbook.loaikyhan">
            @foreach($listkyhan as $kyhan)
                <option value="{{$kyhan->makyhan}}" >{{$kyhan->makyhan}}</option>
            @endforeach
        </select>
    </div> -->
  <button type="submit" class="btn btn-primary" wire:click="Add">Submit</button>
</div>

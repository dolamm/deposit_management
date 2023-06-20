<div>
  <h2>Tạo sổ tiết kiệm mới</h2>
  <!-- user info -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên khách hàng<span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->fullname}}" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->phone}}" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->address}}" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">CMND/CCCD</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->cmnd_cccd}}" disabled>
  </div>
  <!-- end user info -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Số tiền gửi<span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="passbook.sotiengui">
    @error('passbook.sotiengui') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <!-- hinh thuc nap tien -->
    <label for="exampleInputEmail1" class="form-label">Hình thức nạp tiền<span class="text-danger">*</span></label>
    <select class="form-select" aria-label="Default select example" wire:model="data.hinhthucguitien">
      <option selected>Chọn hình thức</option>
      @foreach($data['hinhthuc'] as $key => $value)
      <option value="{{$key}}">{{$value}}</option>
      @endforeach
    </select>
    @error('data.hinhthucguitien') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="form-group">
    <label for="role">Chọn loại kỳ hạn<span class="text-danger">*</span></label>
    <select name="kyhan" class="form-select" aria-label="Default select example" wire:model="passbook.makyhan">
      <option selected>Chọn kỳ hạn</option>
      @foreach($listkyhan as $kyhan)
      <option value="{{$kyhan->makyhan}}">{{$kyhan->tenkyhan}}-{{$kyhan->laisuat}}%</option>
      @endforeach
    </select>
    @error('passbook.makyhan') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    <button type="submit" class="btn btn-primary" wire:click="Add" @if($errors->any()) disabled @endif>Tao</button>
  </div>

</div>
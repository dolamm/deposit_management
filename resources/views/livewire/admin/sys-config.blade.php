<div class="content">
    <div class="container">
        <h2 class="mb-5">Các tham số hệ thống</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá trị</th>
                    <th scope="col">Thay đổi giá trị</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($config as $index => $item)
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$item->tengiatri}}</td>
                    <td>{{$item->mota}}</td>
                    <td>{{$item->giatri}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$item->key}}-edit">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <!-- Modal -->
                        <div wire:ignore.self class="modal fade" id="{{$item->key}}-edit" tabindex="-1" aria-labelledby="{{$item->key}}-edit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="{{$item->key}}-edit">Chỉnh sửa: {{$item->tengiatri}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Giá trị mới</span>
                                            <input type="text" class="form-control" placeholder="Giá trị mới" aria-label="giatri" wire:model="value.{{$item->key}}.giatri" aria-describedby="basic-addon1">
                                        </div>
                                        @error("value.".$item->key.".giatri")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" wire:click="update('{{$item->key}}')">Cập Nhật</button>
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
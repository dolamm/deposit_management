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
                    <form wire:submit.prevent="update('{{$item->key}}')">
                        <th scope="row">{{$index}}</th>
                        <td>{{$item->tengiatri}}</td>
                        <td>{{$item->mota}}</td>
                        <td>{{$item->giatri}}</td>
                        <td>
                            <input type="text" wire:model="value.{{$item->key}}.giatri" class="form-control">
                            @error("value.".$item->key.".giatri")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                        <td>
                            <!-- if error hidden button-->
                            <!-- input == null -->
                            <button @if ($errors->has("value.".$item->key.".giatri")) disabled @endif
                                type="submit" class="btn btn-primary">
                                Cap Nhat
                            </button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
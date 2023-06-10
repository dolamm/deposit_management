<div class="content">
    <div class="container">
        <h2 class="mb-5">Cac tham so he</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ten Bien</th>
                    <th scope="col">Mo Ta</th>
                    <th scope="col">Gia Tri</th>
                    <th scope="col">Chinh Sua</th>
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
                            <input type="number" wire:model="value.{{$item->key}}.giatri" class="form-control">
                            @error("value.".$item->key.".giatri")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </td>
                    <td><button type="submit" class="btn btn-primary">Cap Nhat</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div>
    <h3>Thiet lap cac gia tri bien</h3>
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
                <th scope="row">{{$index}}</th>
                <td>{{$item->tengiatri}}</td>
                <td>{{$item->mota}}</td>
                <td>{{$item->giatri}}</td>
                <td>
                    <form>
                        <input type="number" wire:model="value.{{$item->key}}.giatri" class="form-control">
                        @error('value.'.$item->key.'.giatri')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </form>
                </td>
                <td><button wire:click="update('{{$item->key}}')" class="btn btn-primary">Cap Nhat</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
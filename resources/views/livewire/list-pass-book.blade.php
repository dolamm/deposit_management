<div>
    <div>
        <h1>Danh sách sổ tiết kiệm</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Loại Tiết Kiệm</th>
                    <th scope="col">Khách Hàng</th>
                    <th scope="col">Số Dư</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                @foreach ($passbook as $index => $item)
                <tr>
                    <th scope="row">{{ $index }}</td>
                    <td>
                       {{$item->thongtinkyhan['tenkyhan']}}
                    </td>
                    <td>{{ $item->sodu }}</td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
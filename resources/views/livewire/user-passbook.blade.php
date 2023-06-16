<div>
    <div>
    <h1>Danh sách sổ tiết kiệm</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Loại kỳ hạn</th>
                <th>Số dư</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($personal as $saving) 
        @php
            $jsonData = $saving->thongtinkyhan; 
            $arrayData = json_decode($jsonData, true); 
        @endphp
            <tr>
                <td>{{ $saving->id }}</td>
                <td>{{ $arrayData['makyhan'] }}</td> 
                <td>{{ $saving->sodu }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>

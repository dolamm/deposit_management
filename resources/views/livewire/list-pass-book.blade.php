<div>
    {{-- Do your work, then step back. --}}
    <div>
    <h1>Danh sách sổ tiết kiệm</h1>

    <table>
        <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Loại kỳ hạn</th>
                <th>Số dư</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($passbook as $a)
            @php
                $jsonData = $a->thongtinkyhan; 
                $arrayData = json_decode($jsonData, true); 
            @endphp

            <tr>
                <td>{{ $a->khachhang->fullname }}</td>
                <td>{{ $arrayData['makyhan'] }}</td> 
                <td>{{ $a->sodu }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</div>

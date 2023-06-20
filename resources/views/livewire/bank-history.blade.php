<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Loại giao dịch</th>
                <th scope="col">Ngày giao dịch</th>
                <th scope="col">Số tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $item)
            <tr>
                <td>
                    @switch($item->type)
                    @case('deposit')
                    <i class="fas fa-arrow-down text-success"></i>
                    <span class="badge bg-success">Nạp tiền</span>
                    @break
                    @case('withdraw')
                    <i class="fas fa-arrow-up text-danger"></i>
                    <span class="badge bg-danger">Rút tiền</span>
                    @break
                    @endswitch
                </td>
                <td>
                    {{$item->created_at}}
                </td>
                <td>
                    {{number_format($item->amount)}} VND
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
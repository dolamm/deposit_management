<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="bcngay-tab" data-bs-toggle="tab" data-bs-target="#bcngay" type="button" role="tab" aria-controls="bcngay" aria-selected="true">Ngay</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="bcthang-tab" data-bs-toggle="tab" data-bs-target="#bcthang" type="button" role="tab" aria-controls="bcthang" aria-selected="false">Thang</button>
        </li>
    </ul>
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="bcngay" role="tabpanel" aria-labelledby="bcngay-tab">
                <div>
                    @foreach($kyhan as $key => $value)
                    <!-- two column -->
                    <!-- table -->
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $value->tenkyhan }}</h4>
                            </div>
                            <div class="card-body">
                                <canvas class="w-100" id="myChart-{{ $value->makyhan }}"></canvas>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$value->makyhan}}">
                                {{ $value->tenkyhan }}
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade w-60" id="{{$value->makyhan}}" tabindex="-1" aria-labelledby="{{$value->makyhan}}Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="{{$value->makyhan}}Label">Bao cao{{ $value->tenkyhan }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ngay Tao</th>
                                                    <th scope="col">Tong Thu</th>
                                                    <th scope="col">Tong Chi</th>
                                                    <th scope="col">Chenh Lech</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $item)
                                                @if($item->makyhan == $value->makyhan)
                                                <tr>
                                                    <th scope="row">{{$item->ngaytao}}</th>
                                                    <td>{{$item->tongthu}}</td>
                                                    <td>{{$item->tongchi}}</td>
                                                    <td>{{$item->chenhlech}}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="bcthang" role="tabpanel" aria-labelledby="bcthang-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>
    <script src="{{Vite::asset('resources/js/chart/DoanhSoNgay.js')}}"></script>
</div>
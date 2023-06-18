<div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="sl-so-ngay-tab" data-bs-toggle="tab" data-bs-target="#sl-so-ngay" type="button" role="tab" aria-controls="sl-so-ngay" aria-selected="true">Ngay</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="bcthang-tab" data-bs-toggle="tab" data-bs-target="#bcthang" type="button" role="tab" aria-controls="bcthang" aria-selected="false">Thang</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="sl-so-ngay" role="tabpanel" aria-labelledby="sl-so-ngay-tab">
      @foreach($kyhan as $key => $k)
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{ $k->tenkyhan }}</h4>
          </div>
          <div class="card-body">
            <canvas class="w-50 h-50 d-block m-auto" id="slso-{{ $k->makyhan }}-ngay"></canvas>
          </div>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$k->makyhan}}">
            Chi tiết {{ $k->tenkyhan }}
          </button>
        </div>
        <!--  -->
        <!-- Modal -->
        <div class="modal fade" id="{{$k->makyhan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Báo cáo chi tiết</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!--  -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Ngay</th>
                      <th scope="col">So So Moi</th>
                      <th scope="col">So So Cu</th>
                      <th scope="col">Chenh Lech</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bcngay as $item)
                    @if ($item->makyhan == $k->makyhan)
                    <tr>
                      <th scope="row">{{$item->ngaytao}}</th>
                      <td>{{$item->sl_somoi}}</td>
                      <td>{{$item->sl_sodong}}</td>
                      <td>{{$item->chenhlech}}</td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
                <!--  -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
      </div>
      @endforeach
    </div>
    <div class="tab-pane fade" id="bcthang" role="tabpanel" aria-labelledby="bcthang-tab">
    @foreach($kyhan as $key => $k)
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{ $k->tenkyhan }}</h4>
          </div>
          <div class="card-body">
            <canvas class="w-50 h-50 d-block m-auto" id="slso-{{ $k->makyhan }}-thang"></canvas>
          </div>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$k->makyhan}}-thang">
            {{ $k->tenkyhan }}
          </button>
        </div>
        <!--  -->
        <!-- Modal -->
        <div class="modal fade" id="{{$k->makyhan}}-thang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!--  -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Ngay</th>
                      <th scope="col">So So Moi</th>
                      <th scope="col">So So Cu</th>
                      <th scope="col">Chenh Lech</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bcthang as $key => $stackitem)
                    @if ($key == $k->makyhan)
                    @foreach($stackitem as $ngaytao => $item)
                    <tr>
                      <th scope="row">{{$ngaytao}}</th>
                      <td>{{$item['sl_somoi']}}</td>
                      <td>{{$item['sl_sodong']}}</td>
                      <td>{{$item['chenhlech']}}</td>
                    </tr>
                    @endforeach
                    @endif
                    @endforeach
                  </tbody>
                </table>
                <!--  -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
      </div>
      @endforeach
    </div>
  </div>
  <script type="module" src="{{Vite::asset('resources/js/chart/SLSoNgay.js')}}"></script>
  <script type="module" src="{{Vite::asset('resources/js/chart/SLSoThang.js')}}"></script>
</div>
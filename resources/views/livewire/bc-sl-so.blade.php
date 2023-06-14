<div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="sl-so-ngay-tab" data-bs-toggle="tab" data-bs-target="#sl-so-ngay" type="button" role="tab" aria-controls="sl-so-ngay" aria-selected="true">Home</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
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
            {{ $k->tenkyhan }}
          </button>
        </div>
      </div>
      @endforeach
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
  </div>
  <script type="module" src="{{Vite::asset('resources/js/chart/SLSoNgay.js')}}"></script>
</div>
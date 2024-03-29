@extends('layouts.app')

@section('content')
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng nhập</p>

                <form class="mx-1 mx-md-4" method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="bi bi-envelope-fill" style="padding-right: 10px; font-size: 25px;"></i>
                    <div class="form-outline flex-fill mb-0">

                      <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" />
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="bi bi-key-fill" style="padding-right: 10px; font-size: 25px;"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu" required autocomplete="new-password" />
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-2">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      Ghi nhớ mật khẩu
                    </label>
                  </div>
                  <!-- re captcha -->
                  <!-- data siteke  = env -->.
                  <div class="d-flex justify-content-center mb-2">
                    <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}" data-callback="onSubmit" data-action="submit"></div>
                    <div>
                    @if($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                      <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                    </span>
                    @endif
                    </div>
                  </div>
                  <!-- end re captcha -->
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Quên mật khẩu?') }}
                    </a>
                    @endif
                  </div>
                  

                </form>

                <div class="d-flex justify-content-center mt-4">
                  <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
                </div>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
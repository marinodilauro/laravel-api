@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-4">

        <div class="form_area p-3">
          <p class="title text-center">SIGN-IN</p>
          <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- e-mail address --}}
            <div class="form_group">
              <label class="sub_title" for="email">E-mail</label>
              <input placeholder="Enter your e-mail address" id="email" type="email" class="form_style"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                @error('email') is-invalid @enderror">

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            {{-- password --}}
            <div class="form_group">
              <label class="sub_title" for="password">Password</label>
              <input placeholder="Enter your passowrd" id="password" type="password" class="form_style" name="password"
                value="{{ old('password') }}" required autocomplete="password" autofocus
                @error('password') is-invalid @enderror">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            <div class="mb-4 row">
              <div class="col-md-6 ms-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label sub_title m-0" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="mb-4 row mb-0">
              <div class="col-12">
                <button type="submit" class="login_button">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                  <a class="link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </div>

          </form>
        </div>

        {{--         <div class="card">
          <div class="card-header">{{ __('Login') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="mb-4 row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="mb-4 row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>

                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
@endsection

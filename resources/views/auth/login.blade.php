@extends('layouts.master')

@section('content')
<div class="container-login100" style="background-image: url('/assets/img/smk-14.png');">
    <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
            <span class="login100-form-logo">
                <img src="/assets/img/icons/logo-dark.png">
            </span>

            <span class="login100-form-title p-b-34 p-t-27">
                Login SMK 14 Bandung
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Masukan Email">
                <input class="input100  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Masukan password">
                <input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                 @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


@extends('layouts.master')

@section('content')
<div class="container-login100" style="background-image: url('/assets/img/smk-14.png');">
    <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <span class="login100-form-logo">
                <img src="/assets/img/icons/logo-dark.png">
            </span>

            <span class="login100-form-title p-b-34 p-t-27">
                Login SMK 14 Bandung
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Masukan Email">
                <input class="input100  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="wrap-input100 validate-input" data-validate="Masukan password">
                <input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Login
                </button>
            </div>
            {{-- <div class="container-login100-form-btn">
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-white text-center" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div> --}}
        </form>
    </div>
</div>
@endsection
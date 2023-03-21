@extends('layouts.auth')

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}" autocomplete="off">

        @csrf
        <span class="login100-form-title">
            {{ __('Login') }}
        </span>

        <div class="wrap-input100 validate-input">
            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" id="email"
                placeholder="Email" value="{{ old('email') }}" required autofocus>

            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="mdi mdi-email" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input">
            <input class="input100 @error('password') is-invalid @enderror" type="password" placeholder="Password"
                name="password" id="password" required>

            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="mdi mdi-lock" aria-hidden="true"></i>
            </span>
        </div>

        <div class="d-flex flex-row justify-content-between">
            <div class="form-group">
                <label class="ckbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span
                        class="text-13">{{ __('Remember Me') }}</span>
                </label>
            </div>
            <div class="form-group">
                <p class="mb-0"><a href="{{ route('password.request') }}"
                        class="text-primary ms-1">{{ __('Forgot Password?') }}</a></p>
            </div>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn btn-primary">
                {{ __('Login') }}
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script>
        @if (session('error'))
            swal({
                title: "{{ __('auth.Error!') }}",
                text: "{{ trans('auth.failed') }}",
                type: "error",
            });
        @endif
    </script>
@endsection

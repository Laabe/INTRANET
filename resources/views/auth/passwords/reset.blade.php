@extends('layouts.auth')

@section('content')
    <form class="card shadow-none" method="POST" action="{{ route('password.update') }}">

        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="card-body">

            <div class="text-center">
                <span class="login100-form-title">
                    {{ __('Reset Password') }}
                </span>
                <p>{{ __('Enter your account\'s new password and confirme it') }}</p>
            </div>

            <div class="pt-3" id="forgot">

                <div class="form-group">
                    <label class="form-label" for="email">{{ __('Email address:') }}</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Enter Your Email" type="email" name="email" value="{{ $email ?? old('email') }}"
                        required autocomplete="email" autofocus readonly>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>

                <div class="submit d-grid">
                    <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                </div>
            </div>

        </div>
    </form>
@endsection

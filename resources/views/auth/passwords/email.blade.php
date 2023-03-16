@extends('layouts.auth')

@section('content')
    <form class="card shadow-none" method="POST" action="{{ route('password.email') }}">

        @csrf
        <div class="card-body">

            <div class="text-center">
                <span class="login100-form-title">
                    {{ __('Please confirm your email.') }}
                </span>
                <p class="text-muted">{{ __('Enter the email address registered on your account') }}</p>
            </div>

            <div class="pt-3" id="forgot">
                <div class="form-group">
                    <label class="form-label" for="eMail">Email address:</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Enter Your Email" type="email" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="submit d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="text-center mt-4">
                    <p class="text-dark mb-0">{{ __('Forgot It?') }}<a class="text-primary ms-1"
                            href="{{ route('login') }}">{{ __('Send me Back') }}</a></p>
                </div>
            </div>

        </div>
    </form>
@endsection

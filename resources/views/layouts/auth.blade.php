<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    style="--primary01:rgba(4, 181, 199, 0.1); --primary02:rgba(4, 181, 199, 0.2); --primary03:rgba(4, 181, 199, 0.3); --primary06:rgba(4, 181, 199, 0.6); --primary09:rgba(4, 181, 199, 0.9);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- Theme -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
</head>

<body class="bg-dark">
    <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto text-center">
                <div class="text-center">
                    <img src="{{ asset('assets/logo/logo.svg') }}" class="header-brand-img">
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    @include('layouts.partials.scripts')
</body>

</html>

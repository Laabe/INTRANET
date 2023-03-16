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
    @livewireStyles()

    <!-- Theme -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
</head>

<body class="ltr app sidebar-mini">
    <div class="horizontalMenucontainer">
        <div class="page is-expanded">
            <div class="page-main">
                @include('layouts.partials.header')
                @include('layouts.partials.sidebar')
                <div class="app-content main-content mt-0">
                    <div class="side-app">
                        <div class="main-container container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.scripts')
    @livewireScripts()
</body>

</html>

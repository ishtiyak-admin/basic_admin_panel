<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel") }}</title>
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('public/uploads/logo.png') }}" width="200px">
                    <!-- {{ (getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel") }} -->
                </a>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>

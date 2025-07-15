<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.css')
    <style>
        body {
            background: linear-gradient(to right, #1f1c2c, #928dab);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        .main-wrapper {
            animation: fadeIn 0.8s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>

    @include('layouts.js')
    @yield('js')
</body>
</html>

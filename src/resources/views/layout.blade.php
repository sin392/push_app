<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="manifest" href="manifest.json" />
    <link href="{{ asset('/css/layout.css') }}" rel='stylesheet' type='text/css'>

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}

    @yield('style')
</head>

<body>
    <div class="wrapper">
        @include('components.header')
        <div class="contents">
            <div class="page-title">@yield('title')</div>
            <div class="main">@yield('content')</div>
            <!-- <div class="sub">@yield('submenu')</div> -->
        </div>

        @include('components.footer')
    </div>
    @yield('script')
</body>

</html>

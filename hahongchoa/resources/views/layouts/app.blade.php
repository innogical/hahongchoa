<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hongchoa</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-slim.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{asset('js/popper.min.js') }} " defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@stack('scripts')

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
@include('layouts.navbar')
@yield('nav')

<main class="container">
    @include('layouts.search')
    @yield('search')
    @yield('orderfilter')
    @include('layouts.card-list-room')
    <div class="col">
        <div class="row">
            @for($d = 0; $d<6; $d++  )
                @yield('room')
            @endfor
        </div>
    </div>
</main>
<footer>
    @include('layouts.footer')
    @yield('footer')
</footer>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hongchao</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-slim.min.js') }}"></script>
    <script src="{{asset('js/jquery.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{asset('js/popper.min.js') }} " defer></script>
    <script src="{{asset('js/multipleitem.js') }} " defer></script>
    <script src="{{asset('js/dropzone.js') }} "></script>
    <script src="{{asset('js/config_dropzone.js') }} "></script>




@stack('scripts')

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr:300,400,500" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link href="{{asset('/css/dropzone.css')}}" rel="stylesheet" type="text/css">

    {{-------------------------------------------------------------------------- favicon--------------------------------------------------------------------}}

    {{--<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">--}}
    {{--<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">--}}
    {{--<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">--}}
    {{--<link rel="manifest" href="/site.webmanifest">--}}
    {{--<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f44d31">--}}
    {{--<meta name="msapplication-TileColor" content="#ffffff">--}}
    {{--<meta name="theme-color" content="#ffffff">--}}

    {{-------------------------------------------------------------------------- favicon--------------------------------------------------------------------}}

</head>

<body>
@include('layouts.navbar')

    @yield('nav')

@yield('content')
</body>
</html>

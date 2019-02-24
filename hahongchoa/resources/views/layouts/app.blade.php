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




@stack('scripts')

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr:300,400,500" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


</head>

<body>
@include('layouts.navbar')

    @yield('nav')

@yield('content')
</body>
</html>

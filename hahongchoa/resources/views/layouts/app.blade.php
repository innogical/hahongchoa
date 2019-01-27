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
    <script src="{{asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{asset('js/popper.min.js') }} " defer></script>
    <script src="{{asset('js/multipleitem.js') }} " defer></script>
    <script src="{{asset('js/dropzone.js') }} "></script>
    <script src="{{asset('js/Slideimg.js') }} "></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>


@stack('scripts')

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


</head>

<body>
@include('layouts.navbar')

{{--{{Request::route()->getName()}}--}}
{{--@if(Request::route()->getName() == "search.index")--}}

    {{--@yield('searchnav')--}}
{{--@else--}}
    @yield('nav')
{{--@endif--}}

@yield('content')
</body>
</html>

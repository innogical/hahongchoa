@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        @include('layouts.carousel')
        @yield('slide')
        {{--@include('component.slide-item-review')--}}
        {{--@yield('slide-item')--}}
        @include('component.box-zone')
        @yield('zone')
        @include('component.card-list-zone')
        <div class="container">
            <div class="col">
                <div class="row">
                    @for($i = 0; $i <6; $i++)
                        @yield('cardzone')
                    @endfor

                </div>
            </div>
        </div>
    </div>
    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection
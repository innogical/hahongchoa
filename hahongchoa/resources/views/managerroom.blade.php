@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="text-right mt-2 p-0">
            <a href="{{url('/adroom')}}">
                <button type="button" class="btn btn-primary">ลงประกาศห้อง</button>
            </a>
        </div>


        @include('component.myroom-card')
        <div class="col-12">
            <div class="row">
                        @yield('myroom')
            </div>
        </div>
    </div>
    </div>
    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection
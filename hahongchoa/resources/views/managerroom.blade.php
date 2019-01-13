@extends('layouts.app')
@section('content')

    <div class="container-fluid">

        <div class="text-right mt-2">
            <a href="{{url('/adroom')}}">
                <button type="button" class="btn btn-primary">ลงประกาศห้อง</button>
            </a>
        </div>


        @include('component.myroom-card')
        <div class="col-12">
            <div class="row">
                    {{--@for($i = 0; $i <6; $i++)--}}
                        @yield('myroom')
            {{--@endfor--}}
            </div>
        </div>
    </div>
    </div>
    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection
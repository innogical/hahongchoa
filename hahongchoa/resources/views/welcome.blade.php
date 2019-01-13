@extends('layouts.app')
@section('content')
    <main class="container">
        @include('layouts.search')
        @yield('search')
        {{--@yield('orderfilter')--}}
        @include('layouts.card-list-room')
        <div class="col p-0 ">

            <div class="text-left mt-2">
                <h4 class="color-dark-blue-fond">โฆษณา</h4>
            </div>
            <div class="row m-0">
                {{--@for($d = 0; $d<8; $d++  )--}}

                    @yield('room')
                {{--@endfor--}}
            </div>

            <div class="text-left mt-2">
                <h4 class="color-dark-blue-fond">ห้องใหม่น่าสนใจ</h4>
            </div>
            <div class="row m-0">
                {{--@for($d = 0; $d<8; $d++  )--}}
                {{--todo:: รอแก้ sql--}}
                    @yield('room')
                {{--@endfor--}}
            </div>



        </div>
    </main>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9CSkZmCPxPPyZahRKqk0yfSfav1rZHxg&libraries=places"></script>
    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection
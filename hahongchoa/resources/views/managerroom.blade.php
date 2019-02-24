@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="col-md-12 col-12">

            <div class="row d-flex justify-content-between ">
               <h4 class="mt-2">จัดการห้อง</h4>
                <div class="text-right mt-2 p-0">
                    <a href="{{url('/adroom')}}">
                        <button type="button" class="btn bg_corner color-border-orange">ลงประกาศห้อง</button>
                    </a>
                </div>
            </div>
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
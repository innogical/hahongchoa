@extends('layouts.app')
@section('content')

    <div class="container mt-3 p-md-0">

        <div class="row d-flex justify-content-between ">

            <div class="col-md-12 col-12">
                <div class="d-flex justify-content-between">
                    <h4 class="mt-2">จัดการห้อง</h4>
                    <div class="text-right mt-2 p-0">
                        <a href="{{url('/adroom')}}">
                            <button type="button" class="btn bg_corner color-border-orange font-weight-light color-dark-orange-fond" style="background-color: transparent;">ลงประกาศห้อง</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12  col-12 p-0">
            <div class="row">
                @include('component.myroom-card')
                @yield('myroom')
            </div>
        </div>
    </div>

    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection
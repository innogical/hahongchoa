@extends('layouts.app')
@section('content')


    <div class="container-fluid p-0 position-absolute">
        <div class="embed-responsive embed-responsive-16by9">
            <video width="100%" height="100%" loop autoplay>
                <source src="vdo/screen_login.mp4" type="video/mp4">
            </video>
        </div>
    </div>


    <div class="container ">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 col-12  box-background-manager-login bg_corner h-auto">
                <div class="row">
                    <div class="col p-2">
                        <h5 class="text-white text-center">เข้าสู่ระบบ</h5>
                    </div>
                </div>
                <form action="/loginend" method="post" class="">
                    @csrf
                    <div class="row ">
                        <div class="form-group col-md-8 offset-md-2">
                            <input type="email" class="form-control bg_corner w-100" name="mail"
                                   aria-describedby="emailHelp"
                                   placeholder="Email" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-8 offset-md-2">
                            <input type="password" class="form-control bg_corner" placeholder="Password" name="pass"
                                   required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn_green bg_corner w-100 text-white">
                                เข้าสู่ระบบ
                            </button>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <a href="{{ url('/login/facebook') }}">Login with facebook</a>
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class=" d-flex justify-content-center m-2">
                            <p class="font-italic text-white">ยังไม่สมัครสมาชิก? </p>
                            <a href="{{'/register'}}" class="font-weight-light color-green ml-1">สมัครสมาชิกที่นี่</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer>
        {{--@include('layouts.footer')--}}
        {{--@yield('footer')--}}
    </footer>

@endsection

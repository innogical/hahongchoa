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
            <div class="col-md-8 col-8  box-background-manager-login bg_corner h-auto">
                <div class="row">
                    <div class="col p-2">
                        <h5 class="text-white text-center">สมัครสมาชิก</h5>
                    </div>
                </div>

                <form action="/loginend/{{Auth::user()->id}}" method="post">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control bg_corner w-100" name="mail"
                                   placeholder="Email" required value="{{$user->email}}">
                        </div>
{{--                        <div class="form-group col-md-6 ">--}}
{{--                            <input type="password" class="form-control bg_corner" placeholder="Password" name="password"--}}
{{--                                   required value="{{$user->}}">--}}
{{--                        </div>--}}
                    </div>

                    <div class="row ">


                        <div class="form-group  col-md-6">
                            <input type="text" class="form-control bg_corner" name="usersurname" placeholder="ชื่อ-สกุล" value="{{$user->username}}">
                        </div>


                        <div class="form-group col-md-6">
                            <input type="tel" class="form-control bg_corner" name="telphone" placeholder="เบอร์โทรศัพท์"
                                   maxlength="10" value="{{$user->telephone}}">
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="url" class="form-control bg_corner" name="urlfacebook"
                                   placeholder="https://www.facebook.com/hongchao" value="{{$user->url_facebook}}"
                            >
                        </div>


                        <div class="form-group col-md-6">
                            <input type="url" class="form-control bg_corner" name="linelink"
                                   placeholder="https://line.me/R/ti/p/hongchao" value="{{$user->line_qrcode}}"
                            >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn_green bg_corner w-100 text-white">
                                ยืนยันแก้ไขข้อมูล
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>


@endsection
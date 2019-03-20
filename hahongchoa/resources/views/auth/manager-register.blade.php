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

                <form action="/register" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control bg_corner w-100" name="mail"
                                   placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6 ">
                            <input type="password" class="form-control bg_corner" placeholder="Password" name="password"
                                   required>
                        </div>
                    </div>

                    <div class="row ">


                        <div class="form-group  col-md-6">
                            <input type="text" class="form-control bg_corner" name="usersurname" placeholder="ชื่อ-สกุล">
                        </div>


                        <div class="form-group col-md-6">
                            <input type="tel" class="form-control bg_corner" name="telphone" placeholder="เบอร์โทรศัพท์"
                                   maxlength="10">
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="url" class="form-control bg_corner" name="urlfacebook"
                                   placeholder="https://www.facebook.com/hongchao"
                            >
                        </div>


                        <div class="form-group col-md-6">
                            <input type="url" class="form-control bg_corner" name="linelink"
                                   placeholder="https://line.me/R/ti/p/hongchao"
                            >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn_green bg_corner w-100 text-white">
                                เข้าสู่ระบบ
                            </button>
                        </div>
                    </div>

                </form>

                <div class="row">

                    <div class="col">
                        <div class=" d-flex justify-content-center m-2">
                            <p class="font-italic text-white">สมัครสมาชิกแล้ว </p>
                            <a href="{{'/login'}}" class="font-weight-light color-green ml-1">เข้าสู่ระบบที่นี่</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection
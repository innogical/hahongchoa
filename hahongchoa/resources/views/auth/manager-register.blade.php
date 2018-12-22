@extends('layouts.app')
@section('content')
    <div class="container-fluid bg_img_login p-0">
        <div class="row justify-content-center">
            <div class="col-md-6 .offset-md-3 box-background-manager-login text-center">
                <h5 class="color-dark-blue-fond">
                    สมัครสมาชิก
                </h5>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp"
                               placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" maxlength="10">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="usersurname" placeholder="ชื่อ-สกุล">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="telphone" placeholder="เบอร์โทรศัพท์" maxlength="10">
                    </div>


                    <button type="submit" class="btn justify-content-center color-light-blue mb-2">สมัครสมาชิก</button>
                    <button type="reset" class="btn justify-content-center color-light-blue mb-2">ล้างค่า</button>
                </form>
            </div>
        </div>

    </div>

    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>

@endsection
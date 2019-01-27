@extends('layouts.app')
@section('content')

    <div class="container-fluid bg_img_login p-0">
        <div class="row justify-content-center">
            <div class="col-md-6 .offset-md-3 box-background-manager-login">
                <h5 class="color-dark-blue-fond">เข้าสู่ระบบ</h5>

                <form action="/loginend" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="mail" aria-describedby="emailHelp"
                               placeholder="Email" required>
                        <small id="emailHelp" class="form-text text-muted">กรุณากรอก Email
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required>
                        <small id="emailHelp" class="form-text text-muted">กรุณากรอก Password

                    </div>

                    <button type="submit" class="btn btn-light-blue justify-content-center float-right mb-2">
                        เข้าสู่ระบบ
                    </button>
                </form>
                <a href="{{url('/register')}}">
                    <button type=" submit" class="btn color-higiht-orange-btn text-left mb-2">
                        สมัครสมาชิก
                    </button>
                </a>


            </div>
        </div>


    </div>


    <script>
    // swal("hi");
    </script>

    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>

@endsection

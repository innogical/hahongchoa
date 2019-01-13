@section('nav')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow p-1" style="padding: 0;height: 70px">
            <div class="container" style="padding: 0">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="{{asset('img_view/logo.png')}}" width="120" height="auto" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        {{--<li><a class="  {{ Request::is('/') ? 'color-light-orenge' : 'nav-link' }} "--}}
                               {{--href="{{url('/')}}">หน้าแรก</a></li>--}}
                        {{--<li><a class="  {{ Request:: is('http://127.0.0.1:8000/zone') ? 'color-light-orenge ' : 'nav-link' }} "--}}
                               {{--href="{{ url('/zone') }}">พื้นที่</a></li>--}}

                        @if(\Illuminate\Support\Facades\Auth::User())

                            <div class="dropdown">
                                <button class="btn color-higiht-orange-btn dropdown-toggle" type="button"
                                        data-toggle="dropdown">
                                    {{Auth::User()->username}}
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{'/managerroom'}}" class="color-dark-blue-fond">จัดการห้อง</a></li>
                                    <li><a href="{{'/logout'}}" class="color-dark-blue-fond">ออกจากระบบ</a></li>
                                </ul>
                            </div>
                        @else
                            {{--<li><a class="nav-link" href="{{url('/login')}}">เข้าสู่ระบบ</a></li>--}}
                            <li><a class="nav-link" href="{{url('/login')}}">ลงประกาศห้อง</a></li>

                        @endif

                    </ul>
                </div>
            </div>
        </nav>

    </div>

@endsection

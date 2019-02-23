@section('nav')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow_box p-1" style="padding: 0;height: 70px">
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
                    {{--<ul class="navbar-nav mr-auto">--}}
                    @if(Request::url() =="http://127.0.0.1:8000/roomnearskytrian" && $lifestyle_location != "")
                        {{--<p>ok</p>--}}
                        <div class="col-10">

                            <div class="row">
                                <div class=" col-2">
                                    <p class="color-dark-blue-fond mt-3 text-center">คำค้นหา</p>
                                </div>
                                <input type="text" name="lifestyleplace" class="col-8 border-0 shadow mt-2"
                                       placeholder="สถานที่ทำงาน / มหาวิทยาลัย" value="{{$lifestyle_location}}"
                                       style="padding: 10px">
                                {{--{{$lifestyle_location}}--}}
                            </div>
                        </div>

                    @endif
                    <ul class="navbar-nav ml-auto">
                        @if(Request::url() == "http://127.0.0.1:8000/room/*")


                        @else
                            <div class="btn btn-orange-light" id="btn_compare">เปรียบเทียบห้อง</div>

                        @endif
                        @if(\Illuminate\Support\Facades\Auth::User())

                            <div class="dropdown">
                                <button class="btn color-higiht-orange-btn dropdown-toggle" type="button"
                                        data-toggle="dropdown">
                                    {{Auth::User()->username}}
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{'/adroom'}}" class="color-dark-blue-fond">ลงประกาศห้อง</a></li>
                                    <li><a href="{{'/managerroom'}}" class="color-dark-blue-fond">จัดการห้อง</a>
                                    </li>
                                    <li><a href="{{'/logout'}}" class="color-dark-blue-fond">ออกจากระบบ</a></li>
                                </ul>
                            </div>
                        @else
                            {{--<li><a class="nav-link" href="{{url('/login')}}">เข้าสู่ระบบ</a></li>--}}
                            <li><a class="nav-link border color-border-orange"
                                   href="{{url('/login')}}">ลงประกาศห้อง</a>
                            </li>
                        @endif


                    </ul>
                </div>
            </div>
        </nav>

    </div>

@endsection

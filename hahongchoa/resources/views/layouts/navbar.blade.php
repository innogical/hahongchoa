@section('nav')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow" style="padding: 0;height: 70px">
            <div class="container" style="padding: 0">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="{{asset('img_view/logo.png')}}" width="70" height="auto" alt="logo">
                </a>
                <a class="navbar-brand" href="#">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="{{url('/')}}">หน้าแรก</a></li>
                        <li><a class="nav-link" href="{{ url('/zone') }}">พื้นที่</a></li>
                        <li><a class="nav-link" href="">เข้าสู๋ระบบ</a></li>

                    </ul>
                </div>
            </div>
        </nav>

    </div>

@endsection
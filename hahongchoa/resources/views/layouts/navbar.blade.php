@section('nav')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow_box " style="padding: 0;height: 70px">
            <div class="container p-md-0">
                <a class="navbar-brand  p-0" href="{{ url('/') }}">
                    <img src="{{asset('img_view/logo.png')}}" height="auto" alt="logo" class="p-2 size_logo">
                </a>

            {{--<button class="navbar-toggler" type="button" data-toggle="collapse"--}}
            {{--data-target="#navbarSupportedContent"--}}
            {{--aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
            {{--</button>--}}

            {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            <!-- Left Side Of Navbar -->
                {{--<ul class="navbar-nav mr-auto">--}}
                @if(Request::url() =="http://127.0.0.1:8000/roomnearskytrian" && $lifestyle_location != "")
                    {{--<p>ok</p>--}}
                    <div class="col-10 show_desktop">

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
                    {{--{{Request::url()}}--}}
                    @if(Request::url() == "http://127.0.0.1:8000")
                        <div class="btn btn-orange-light mx-2 bg_corner " id="btn_compare">เปรียบเทียบห้อง</div>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::User())

                        <div class="dropdown">
                            <button class="btn btn_green bg_corner text-white font-weight-light dropdown-toggle"
                                    type="button"
                                    data-toggle="dropdown">
                                {{Auth::User()->username}}
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu p-1">
                                <li><a href="{{'/adroom'}}" class="color-dark-blue-fond">ลงประกาศห้อง</a></li>
                                <li><a href="{{'/managerroom'}}" class="color-dark-blue-fond">จัดการห้อง</a>
                                </li>
                                <li><a href="{{'/logout'}}" class="color-dark-blue-fond">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    @else
                        {{--<li><a class="nav-link" href="{{url('/login')}}">เข้าสู่ระบบ</a></li>--}}

                        @if(Request::url() == "http://127.0.0.1:8000/adroom/"  || Request::url() == "http://127.0.0.1:8000/register"  )


                        @elseif( Request::url() == "http://127.0.0.1:8000/roomnearskytrian")
                            {{--<li id="btn_op_form">--}}
                            {{--<a class="nav-link border bg_corner color-border-orange px-2 mr-2 text-black-50">ค้นหาห้องเช่า</a>--}}
                            {{--</li>--}}
                            <button type="button" class="btn bg_corner color-border-orange text-black-50 show_mobile"
                                    data-toggle="modal"
                                    data-target="#exampleModal">
                                ค้นหาห้องเช่า
                            </button>


                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            @if($lifestyle_location == "search_nearLocation")
                                                <h5 class="modal-title text-center" id="exampleModalLabel">
                                                    ค้นหาห้องเช่าใกล้สถานที่</h5>
                                            @else
                                                <h5 class="modal-title text-center" id="exampleModalLabel">
                                                    ค้นหาห้องเช่าาใกล้สถานีรถไฟฟ้า่</h5>
                                            @endif
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/roomnearskytrian" method="post" class=" bg-white">
                                                @csrf
                                                @if($lifestyle_location != "" || $lifestyle_location != null)
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <lable class="mt-2">คำค้นหา่</lable>
                                                            <input type="text" class="bg_corner form-control"
                                                                   name="lifestyleplace" required
                                                                   value="{{$lifestyle_location}}">
                                                        </div>
                                                    </div>

                                                @endif
                                                <div class="row mt-2">


                                                    <div class="col-6">
                                                        <lable class="mt-2">ราคาตํ่าสุด</lable>
                                                        <input type="text" class="bg_corner form-control"
                                                               name="price_low" required
                                                               value="{{$price_low}}">
                                                    </div>
                                                    <div class="col-6">
                                                        <lable class="mt-2">ราคาสูงสุด</lable>
                                                        <input type="text" class="bg_corner form-control"
                                                               name="price_high" required
                                                               value="{{$price_high}}">
                                                    </div>


                                                    <input type="text" name="stat_search_option" hidden required
                                                           value="search_nearLocation">


                                                    {{--<lable class="mt-2">ถึง</lable>--}}
                                                    {{--<div class="col-6">--}}
                                                    {{--<input type="text" class=" bg_corner border form-control"--}}
                                                    {{--value="{{$price_high}}">--}}
                                                    {{--</div>--}}
                                                </div>
                                                {{----}}

                                                <div class="row mt-2">
                                                    {{--<lable class="mt-2">จำนวนผู้อาศัย</lable>--}}

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect2">จำนวนผู้อาศัย</label>
                                                            <select id="inputState"
                                                                    class=" bg_corner border form-control"
                                                                    name="person_live" required>
                                                                <option value="{{$person_live}}"
                                                                        selected> {{$person_live}}คน
                                                                </option>
                                                                <option value="1"> 1คน</option>
                                                                <option value="2"> 2คน</option>
                                                                <option value="3"> 3คน</option>
                                                                <option value="4"> 4คน</option>
                                                                <option value="5"> 5คน</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    @if($zone_bts == [] || $zone_bts == null || $zone_bts == "")


                                                    @else
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect2">สถานีรถไฟฟ้า</label>
                                                                <select id="inputState"
                                                                        class="form-control bg_corner border col-md-12 col-12"
                                                                        name="area_zone" required>
                                                                    <option value="{{$name_bts_select->id}}"
                                                                            selected>{{$name_bts_select->name_station}}</option>
                                                                    @foreach($zone_bts as $a_zone)
                                                                        <option value="{{$a_zone->id}}">{{$a_zone-> name_station }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    @endif

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect2">การเดินทาง</label>
                                                            <select id="inputState"
                                                                    class="form-control bg_corner border col-md-12 col-12"
                                                                    name="optioncar">
                                                                <option value="{{$optioncar}}"
                                                                        selected>{{$optioncar}}</option>
                                                                <option value="nothavecar">ไม่มีรถยนตร์</option>
                                                                <option value="havecar">มีรถยนตร์</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <input type="text" name="stat_search_option" hidden
                                                       value="{{$stat_search_option}}">

                                                <button type="submit"
                                                        class="btn col-6 offset-3 btn_green bg_corner text-white "
                                                        style="height: 40px">
                                                    ค้นหาห้อง
                                                </button>
                                            </form>

                                        </div>


                                    </div>


                                    </form>
                                </div>
                                {{--<div class="modal-footer">--}}
                                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                {{--</div>--}}
                            </div>
                            {{--</div>--}}
                            {{--</div>--}}


                        @else
                            <li><a class="nav-link border bg_corner color-border-orange px-1 mr-2"
                                   href="{{url('/login')}}">ลงประกาศห้อง</a>
                            </li>
                        @endif
                    @endif


                </ul>
            </div>
            {{--</div>--}}
        </nav>

    </div>



@endsection

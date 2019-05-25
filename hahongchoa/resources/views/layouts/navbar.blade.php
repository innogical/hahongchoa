@section('nav')

    <div id="app" class="
                        @if(Request::url() == "http://127.0.0.1")

            position-fixed col-12 p-0

        @else
    @endif
            "

         style="z-index: 1">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow_box  "
             style="padding: 0;height: 70px">
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
                    <div class="col-md-9 show_desktop">

                        <div class="row">
                            <div class="col-md-2 p-0">
                                <p class="color-dark-blue-fond mt-3 text-center">คำค้นหาสถานที่</p>
                            </div>

                            <input type="text" id="input_real_lifestyle"
                                   class="p-2 col-md-6 border-0 shadow_box  bg_corner mt-2"
                                   placeholder="สถานที่ทำงาน / มหาวิทยาลัย" value="{{$lifestyle_location}}"
                                   style="padding: 10px">
                            {{--{{$lifestyle_location}}--}}
                        </div>
                        <div class="offset-md-10"></div>


                    </div>

                @endif

                <ul class="navbar-nav">
                    {{--{{Request::url()}}--}}
                    @if(Request::url() == "http://127.0.0.1:8000")
                        <div class="btn btn-orange-light mx-2 bg_corner " id="btn_compare">เปรียบเทียบห้อง</div>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::User())

                        <div class="dropdown">
                            <button class="btn color-border-orange color-dark-orange-fond bg_corner text-white font-weight-light dropdown-toggle"
                                    type="button"
                                    data-toggle="dropdown" style="background-color: transparent">
                                {{Auth::User()->username}}
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu p-1 position-absolute">
                                <li><a href="{{'/adroom'}}" class="color-dark-blue-fond">ลงประกาศห้อง</a></li>
                                <li><a href="{{'/managerroom'}}" class="color-dark-blue-fond">จัดการห้อง</a>
                                </li>
                                <li><a href="{{'/logout'}}" class="color-dark-blue-fond">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    @else
                        {{--<li><a class="nav-link" href="{{url('/login')}}">เข้าสู่ระบบ</a></li>--}}

                        @if(Request::url() == "http://127.0.0.1:8000/adroom/"  || Request::url() == "http://127.0.0.1:8000/register"  )


                        @elseif( Request::url() == "http://127.0.0.1:8000/roomnearskytrian" )
                            {{--<li id="btn_op_form">--}}
                            {{--<a class="nav-link border bg_corner color-border-orange px-2 mr-2 text-black-50">ค้นหาห้องเช่า</a>--}}
                            {{--</li>--}}
                            <button type="button"
                                    class="btn bg_corner color-border-orange text-black-50 show_mobile color-dark-orange-fond"
                                    data-toggle="modal" style="background-color: transparent"
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
                                                    ค้นหาห้องเช่าาใกล้สถานีรถไฟฟ้า</h5>
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

                                                            <lable class="mt-2">คำค้นหา</lable>
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
                                                            <label for="exampleFormControlSelect2">ผู้อาศัย</label>
                                                            <select id="inputState"
                                                                    class=" bg_corner border form-control"
                                                                    name="person_live" required>
                                                                <option value="{{$person_live}}"
                                                                        selected> {{$person_live}}คน
                                                                </option>
                                                                <option value="1" @if($person_live ==1) selected @endif>
                                                                    1คน
                                                                </option>
                                                                <option value="2" @if($person_live ==2) selected @endif>
                                                                    2คน
                                                                </option>
                                                                <option value="3" @if($person_live ==3) selected @endif>
                                                                    3คน
                                                                </option>
                                                                <option value="4" @if($person_live ==4) selected @endif>
                                                                    4คน
                                                                </option>
                                                                <option value="5" @if($person_live ==5) selected @endif>
                                                                    5คน
                                                                </option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    @if($zone_bts == [] || $zone_bts == null || $zone_bts == "")

                                                    @else
                                                        <lable class="">สถานี</lable>
                                                        {{--<div class="col-md-8 col-8 p-0">--}}

                                                        <select id="inputState"
                                                                class="form-control  custom-select bg_corner border col-md-12 col-12 shadow_box"
                                                                name="area_zone">
                                                            {{--<option value="{{$area_zone}}" selected>{{$area_zone}}</option>--}}
                                                            @foreach($zone_bts as $a_zone)
                                                                <option value="{{$a_zone->id }}"
                                                                        @if($a_zone->id == $station_bts) selected @endif>{{$a_zone-> name_station }}</option>
                                                            @endforeach
                                                        </select>
                                                        {{----}}
                                                        {{--<div class="col">--}}
                                                        {{--<div class="form-group">--}}
                                                        {{--<label for="exampleFormControlSelect2">สถานีรถไฟฟ้า</label>--}}
                                                        {{--<select id="inputState"--}}
                                                        {{--class="form-control bg_corner border col-md-12 col-12"--}}
                                                        {{--name="area_zone" required>--}}
                                                        {{--<option value="{{$name_bts_select->id}}"--}}
                                                        {{--selected>{{$name_bts_select->name_station}}</option>--}}
                                                        {{--@foreach($zone_bts as $a_zone)--}}
                                                        {{--<option value="{{$a_zone->id}}">{{$a_zone-> name_station }}</option>--}}
                                                        {{--@endforeach--}}
                                                        {{--</select>--}}
                                                        {{--</div>--}}

                                                        {{--</div>--}}
                                                    @endif

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect2">การเดินทาง</label>
                                                            <select id="inputState"
                                                                    class="form-control bg_corner border col-md-12 col-12"
                                                                    name="optioncar">
                                                                <option value="havecar"
                                                                        @if($optioncar =="havecar") selected @endif>
                                                                    มีรถส่วนตัว
                                                                </option>
                                                                <option value="nothavecar"
                                                                        @if($optioncar =="nothavecar") selected @endif>
                                                                    ไม่มีรถส่วนตัว
                                                                </option>
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
                        @elseif( Request::url()== "http://127.0.0.1:8000/roomnearskytrian/sortresult")


                        @else
                            <li>
                                <a class="nav-link border screen_desktop bg_corner color-border-orange font-weight-light px-2 mr-2 color-dark-orange-fond"
                                   href="{{url('/login')}}">ลงประกาศห้อง</a>
                            </li>
                            {{--version Moblie--}}
                            <li>
                                <a class="nav-link border  show_mobile bg_corner color-border-orang font-weight-light px-2 mr-2 color-dark-orange-fond"
                                   href="{{url('/login')}}" id="regis_clicke" data-toggle="modal"
                                   data-target="#exampleModal">ลงประกาศห้อง</a>
                            </li>


                            <!-- The Modal -->

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content box-background-manager-login" style="opacity: 10">
                                        <div class="modal-header" style=" border-bottom: 1px solid #ccc;">
                                            <h5 class="modal-title text-white-50" id="exampleModalLabel">
                                                เข้าสู่ระบบ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{--<div class="row m-2">--}}
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <form action="/loginend" method="post" class="">
                                                        @csrf
                                                        <div class="row ">
                                                            <div class="form-group col-md-8 offset-md-2">
                                                                <input type="email" class="form-control bg_corner w-100"
                                                                       name="mail"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Email" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-8 offset-md-2">
                                                                <input type="password" class="form-control bg_corner"
                                                                       placeholder="Password" name="pass"
                                                                       required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8 offset-md-2">
                                                                <button type="submit"
                                                                        class="btn btn_green bg_corner w-100 text-white">
                                                                    เข้าสู่ระบบ
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>


                                                {{--</div>--}}
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <div class="col d-flex justify-content-center">
                                                <p class="font-italic text-white">ยังไม่สมัครสมาชิก? </p>

                                                <a class="font-weight-light color-green ml-1"
                                                   href="{{url('/login')}}" id="regis_clicke" data-toggle="modal"
                                                   data-target="#exampleModal_regis">สมัครสมาชิกที่นี่</a>


                                                {{--<a href="{{'/register'}}" class="font-weight-light color-green ml-1">สมัครสมาชิกที่นี่</a>--}}
                                            </div>
                                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close--}}
                                            {{--</button>--}}
                                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="exampleModal_regis" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content box-background-manager-login" style="opacity: 10">
                                        <div class="modal-header" style=" border-bottom: 1px solid #ccc;">
                                            <h5 class="modal-title text-white-50" id="exampleModalLabel">
                                                สมัครสมาชิก</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{--<div class="row m-2">--}}
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <form action="/register" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <input type="email" class="form-control bg_corner w-100"
                                                                       name="mail"
                                                                       placeholder="Email" required>
                                                            </div>
                                                            <div class="form-group col-md-6 ">
                                                                <input type="password" class="form-control bg_corner"
                                                                       placeholder="Password" name="password"
                                                                       required>
                                                            </div>
                                                        </div>

                                                        <div class="row ">


                                                            <div class="form-group  col-md-6">
                                                                <input type="text" class="form-control bg_corner"
                                                                       name="usersurname" placeholder="ชื่อ-สกุล">
                                                            </div>


                                                            <div class="form-group col-md-6">
                                                                <input type="tel" class="form-control bg_corner"
                                                                       name="telphone" placeholder="เบอร์โทรศัพท์"
                                                                       maxlength="10">
                                                            </div>


                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <input type="url" class="form-control bg_corner"
                                                                       name="urlfacebook"
                                                                       placeholder="https://www.facebook.com/hongchao"
                                                                >
                                                            </div>


                                                            <div class="form-group col-md-6">
                                                                <input type="url" class="form-control bg_corner"
                                                                       name="linelink"
                                                                       placeholder="https://line.me/R/ti/p/hongchao"
                                                                >
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-md-8 offset-md-2">
                                                                <button type="submit"
                                                                        class="btn btn_green bg_corner w-100 text-white">
                                                                    เข้าสู่ระบบ
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                </div>


                                                {{--</div>--}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>




                        @endif
                    @endif


                </ul>
            </div>
            {{--</div>--}}
        </nav>

    </div>



    <script>
        $('#regis_clicke').click(function () {
            console.log("clicke btn");
            $('#exampleModal').hide();
        });


    </script>
@endsection


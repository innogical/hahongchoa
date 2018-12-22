@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="color-dark-blue-fond mt-2">ประกาศห้องว่าง</h4>
        <form action="/adroom" method="post" enctype="multipart/form-data" class="Dropzone">
            @csrf
            <div class="row">
                <div class="col-6 mt-2">
                    <input type="text" class="form-control" name="namecondo" required
                           placeholder="ชื่ออพาร์ตเมนต์/คอนโด">
                </div>

                <div class="col-6 mt-2">
                    <input type="text" class="form-control" name="address" required placeholder="ที่อยู่">
                </div>


                <div class="col-6 mt-2">
                    <select id="inputState" class="form-control" name="zonearea">
                        @foreach($listzone as $index=>$namezone)
                            <option value="{{$index+1}}">{{$namezone}}</option>
                        @endforeach
                    </select>

                    {{--<input type="text" class="form-control" name="sizeroom" placeholder="ขนาดห้อง">--}}
                </div>
                <div class="col-6 mt-2">
                    <select id="inputState" class="form-control" name="lifestyle">
                        @foreach($lifestyle as $index=> $lifestyle_name)
                            <option value="{{$index+1}}">{{$lifestyle_name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--<div class="form-group col-6 mt-2">--}}

                    {{--<select id="inputState" class="form-control">--}}
                        {{--@foreach($promise as $index=> $apromise)--}}
                            {{--<option value="{{$index+1}}">{{$apromise}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}


                    {{----}}
                    {{--<select id="inputState" class="form-control" name="zonearea">--}}
                        {{--@foreach($listzone as $index=>$namezone)--}}
                            {{--<option value="{{$index+1}}">{{$namezone}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}

                <div class="col-6 mt-2">
                    <input type="text" class="form-control" placeholder="จุดเด่น" name="hilight">
                </div>
                <div class="form-group col-6 mt-2">
                    <select id="inputState" class="form-control">
                        @foreach($promise as $index=> $apromise)
                            <option value="{{$index+1}}">{{$apromise}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mt-2">
                    <input type="text" class="form-control" placeholder="รายละเอียด" name="detail">
                </div>
                {{--<div class="col-6 mt-2">--}}
                    {{--<input type="text" class="form-control" placeholder="จุดเด่น" name="hilight">--}}
                {{--</div>--}}

                <div class="col-6 mt-2">

                    <select id="inputState" class="form-control" name="bts">
                        @foreach($bts as $index=> $list_brs)
                            <option value="{{$index+1}}">{{$list_brs}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row">

                <div class="col-3 mt-2">
                    <input type="text" class="form-control" name="sizeroom" placeholder="ขนาดห้อง">
                </div>
                <div class="col-3 mt-2">
                    <input type="text" class="form-control" placeholder="ราคา/เดือน" name="price">
                </div>
                <div class="col-3 mt-2">
                    <input type="text" class="form-control" name="amoutroom" required placeholder="จำนวนห้อง">
                </div>
                <div class="form-group col-3 mt-2">
                    <input type="number" name="amoutLife" required placeholder="จำนวนผู้อาศัย" style="width: 100%">
                </div>
            </div>


            <div class="col-12 border mt-2" style="height: 146px" id="myDropzone">

                {{--<div id="dropzone" class="row">--}}
                {{--<form action="/adroom" class=" form-control dropzone needsclick dz-clickable" id="demo-upload">--}}
                {{--@csrf--}}
                {{--<div class="col-12" style="height: 146px">--}}
                {{--<div class="dz-message needsclick text-center">--}}
                {{--Drop files here or click to upload.<br>--}}
                {{--<span class="note needsclick text-center">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}
                {{--</div>--}}


                <div class="fallback">
                    <input name="file[]" type="file" multiple/>
                    <div class="dz-message needsclick">
                        Drop files here or click to upload.<br>
                        <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                    </div>
                </div>
            </div>
            <input type="file" name="filescan" class="col-12 border mt-2 " style="height: 40px;">
            {{--<div class="text-center mt-2">--}}
            {{--<h5>สิ่งอำนวยความสะดวก</h5>--}}
            {{--</div>--}}

            {{--<div class="">--}}
            {{--<h2>แก้design</h2>--}}
            {{--</div>--}}

            <div class="text-center mt-2">
                <h5>ค่าใช้จ่าย</h5>

            </div>
            <div class="col-12">

                <div class="row">
                    <div class="col-4">
                        <div class="form-group ">
                            <div class="row text-center">
                                <label for="inputEmail3">ค่าไฟฟ้าหน่วยละ</label>
                                <input type="text" class="form-control col-4 ml-2" id="inputEmail3" name="enagy"
                                       placeholder="หน่วยละ">
                            </div>

                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group ">
                            <div class="row text-center">
                                <label for="inputPassword3">ค่าส่วนกลาง</label>
                                <input type="text" class="form-control  col-4 ml-2" id="inputPassword3"
                                       name="middle_val"
                                       placeholder="ค่าส่วนกลาง">
                            </div>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="form-group ">
                            <div class="row text-center">
                                <label for="inputEmail3">ค่าประกันห้อง</label>
                                <input type="text" class="form-control  col-4 ml-2" id="inputEmail3" name="insurance"
                                       placeholder="ค่าประกันห้อง">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group ">
                            <div class="row text-center">
                                <label for="inputPassword3">ค่านํ้าประปา</label>
                                <input type="text" class="form-control  col-4 ml-2" id="inputPassword3"
                                       placeholder="ค่านํ้าประปา"
                                       name="water">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group ">
                            <div class="row text-center">
                                <label for="inputEmail3">ค่าทำสัญญา</label>
                                <input type="text" class="form-control  col-4 ml-2" id="inputEmail3"
                                       placeholder="ค่าทำสัญญา"
                                       name="promise">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <div class="row text-center">
                                <label for="inputEmail3">ค่าอินเตอร์เน็ต</label>
                                <input type="text" class="form-control  col-4 ml-2" id="inputEmail3"
                                       placeholder="ค่าอินเตอร์เน็ต"
                                       name="internet">
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <div class="col-4">
                                <input type="text" class="form-control  col-4 ml-2" id="inputLat"
                                       placeholder="ค่าอินเตอร์เน็ต"
                                       name="lat" hidden>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <div class="col-4">
                                <input type="text" class="form-control  col-4 ml-2" id="inputLng"
                                       placeholder="ค่าอินเตอร์เน็ต"
                                       name="lng" hidden>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group row">
                        <div class="col-4">
                            <input type="text" class="form-control" id="inputLng" placeholder="ค่าอินเตอร์เน็ต"
                                   name="user_token" value="{{Auth::User()->remember_token}}" hidden>
                        </div>
                    </div>

                </div>
            </div>

    </div>

    <div id="map" style="height: 384px"></div>
    <script>
        // var map;
        //
        // function initMap() {
        //     var uluru = {lat: -25.344, lng: 131.036};
        //     var map = new google.maps.Map(
        //         document.getElementById('map'), {zoom: 4, center: uluru});
        //     var marker = new google.maps.Marker({position: uluru, map: map})
        // }
    </script>

    <div class="justify-content-center text-center mb-2">

        <button type="reset" class="btn btn-primary color-dark-blue-fond mt-2 border-0">ล้างค่า</button>

        <button type="submit" class="btn btn-primary mt-2 btn-light-blue text-right border-0">ยืนยัน
        </button>
    </div>

    </form>

    </div>

    <script>
        var myDropzone = new Dropzone("div#mydropzone", {url: "/file/post"});
        $("div#myDrop").dropzone({url: "/file/post"});


    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9CSkZmCPxPPyZahRKqk0yfSfav1rZHxg&callback=initMap"
    ></script>


    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection


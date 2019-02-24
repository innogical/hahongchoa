@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="color-dark-blue-fond mt-2 text-left">ประกาศห้องว่าง</h4>


        <form action="/adroom" method="post" enctype="multipart/form-data" class="Dropzone">
            @csrf
            <div class="row">
                <div class="col-6 mt-2">
                    <input type="text" class="form-control bg_corner" name="namecondo" required
                           placeholder="ชื่ออพาร์ตเมนต์/คอนโด">
                </div>

                <div class="col-6 mt-2">
                    <input type="text" class="form-control bg_corner" name="address" required placeholder="ที่อยู่">
                </div>


                <div class="col-6 mt-2">
                    <select id="inputState" class="form-control bg_corner" name="zonearea">
                        <option value="1" selected>ใกล้รถไฟฟ้า</option>
                        @foreach($bts as $index=>$namezone)
                            <option value="{{$index+1}}">{{$namezone}}</option>
                        @endforeach
                    </select>

                    {{--<input type="text" class="form-control" name="sizeroom" placeholder="ขนาดห้อง">--}}
                </div>

                <div class="col-6 mt-2">
                    <select id="inputState" class="form-control bg_corner" name="lifestyle">
                        <option value="1" selected>Lifestyle</option>
                        @foreach($lifestyle as $index=> $lifestyle_name)
                            <option value="{{$index+1}}">{{$lifestyle_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-6 mt-2">
                    <select id="inputState" class="form-control bg_corner" name="promise">
                        <option value="1" selected>สัญญาเช่า</option>
                        @foreach($promise as $index=> $apromise)
                            <option value="{{$index+1}}">{{$apromise}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-2">
                    <div class="row">
                        <div class="col-md-8">

                            <input type="text" class="form-control"
                                   placeholder="จุดเด่น กรุณาย่อเนื้อหาจุดเด่นของคุณภายใน 80 ตัวอักษร" name="hilight"
                                   id="hilight" required
                                   onkeyup="counttext()" maxlength="80">
                        </div>
                        <div class="col-4 mb-2">

                            <p></p>
                            <p><span id="totaltext">0</span>/80 ตัวอักษร</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-12 mt-2">
                    <textarea name="detail" placeholder="รายละเอียดห้อง" class="form-control bg_corner" id="" cols="30"
                              rows="10"></textarea>
                    {{--<input type="text" class="form-control bg_corner" placeholder="รายละเอียด" name="detail">--}}
                </div>
                {{--<div class="col-6 mt-2">--}}
                {{--<input type="text" class="form-control" placeholder="จุดเด่น" name="hilight">--}}
                {{--</div>--}}

                {{--<div class="col-6 mt-2">--}}

                {{--<select id="inputState" class="form-control" name="bts">--}}
                {{--@foreach($bts as $index=> $list_brs)--}}
                {{--<option value="{{$index+1}}">{{$list_brs}}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
                {{--</div>--}}

            </div>
            <div class="row">

                <div class="col-3 mt-2 bg_corner">
                    <input type="text" class="form-control bg_corner" name="sizeroom" placeholder="ขนาดห้อง">
                </div>
                <div class="col-3 mt-2 bg_corner">
                    <input type="text" class="form-control bg_corner" placeholder="ราคา/เดือน" name="price">
                </div>
                <div class="col-3 mt-2 bg_corner">
                    <input type="text" class="form-control bg_corner" name="amoutroom" required placeholder="จำนวนห้อง">
                </div>
                <div class="form-group bg_corner col-3 mt-2">
                    <input type="number" name="amoutLife" class="form-control bg_corner" required
                           placeholder="จำนวนผู้อาศัย" style="width: 100%">
                </div>
            </div>


            <div class="col-12 border mt-2" style="height: 146px" id="myDropzone">

                <div class="fallback bg_corner">
                    <input name="file[]" type="file" multiple class="form-control-file"/>
                    <div class="dz-message needsclick">
                        Drop files here or click to upload.<br>
                        <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                    </div>
                </div>
            </div>
            {{--<input type="file" name="filescan" class="col-12 border mt-2 " style="height: 40px;">--}}
            <div class="text-left mt-2">
                <h6 class="color-dark-blue-fond">สิ่งอำนวยความสะดวก</h6>
            </div>

            <div class="row d-flex justify-content-between">
                @foreach($icon as $index => $a_icon  )
                    <div class="col-1 text-center" id="btn_facility">
                        <label class="btn border bg_corner " style="border-radius: 100%; width: 46px"
                               id="border_faci{{$index}}"
                        >
                            <img src="{{asset('/icon/'.$a_icon )}}"
                                 style="height: 36px; bottom: 50px;left: 30px;" class="position-absolute">
                            <input type="checkbox" value="{{$index}}" id="btnCheckbox{{$index}}"
                                   name="options_facility" class="invisible position-absolute"
                                   onclick="selectbtnCheckbox()">
                        </label>
                        <p class="color-dark-blue-fond text-center">{{str_replace(".svg","",$a_icon)}}</p>

                    </div>
                @endforeach
            </div>


            <div class="text-left mt-2">
                <h6 class="color-dark-blue-fond">แผนที่</h6>
            </div>
            <div id="map" style="height: 384px"></div>

            <input type="text" id="inputLat" name="lat" hidden>
            <input type="text" id="inputLng" name="lng" hidden>
            <input type="text" name="facility" id="facility" hidden>

            <div class="col-md-12 m-2" >
                <div class="row">
                    <div class="d-flex justify-content-center col-12">

                        <div class="col-md-4">
                            <button type="reset" class="col btn text-black-50 ">ล้างค่า</button>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class=" col btn bg_corner btn_green  text-white"
                                    id="comfiem_addroom">ยืนยัน

                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>

    {{--<script>--}}
    {{--var myDropzone = new Dropzone("div#mydropzone", {url: "/file/post"});--}}
    {{--$("div#myDrop").dropzone({url: "/file/post"});--}}
    {{--</script>--}}

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4rGqTDO8N1hqO6JJw0nQt0aIHGZ0QRKs&callback=initMap"
    ></script>


    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection


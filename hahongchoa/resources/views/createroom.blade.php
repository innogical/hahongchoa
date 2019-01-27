@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="color-dark-blue-fond mt-2 text-left">ประกาศห้องว่าง</h4>


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
                        <option value="1" selected>ใกล้รถไฟฟ้า</option>
                        @foreach($bts as $index=>$namezone)
                            <option value="{{$index+1}}">{{$namezone}}</option>
                        @endforeach
                    </select>

                    {{--<input type="text" class="form-control" name="sizeroom" placeholder="ขนาดห้อง">--}}
                </div>

                <div class="col-6 mt-2">
                    <select id="inputState" class="form-control" name="lifestyle">
                        <option value="1" selected>Lifestyle</option>
                    @foreach($lifestyle as $index=> $lifestyle_name)
                            <option value="{{$index+1}}">{{$lifestyle_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mt-2">
                    <input type="text" class="form-control" placeholder="จุดเด่น" name="hilight">
                </div>
                <div class="form-group col-6 mt-2">
                    <select id="inputState" class="form-control" name="promise">
                        @foreach($promise as $index=> $apromise)
                            <option value="{{$index+1}}">{{$apromise}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col mt-2">
                    <input type="text" class="form-control" placeholder="รายละเอียด" name="detail">
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

                <div class="fallback">
                    <input name="file[]" type="file" multiple/>
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

            <div class="row">
                @foreach($icon as $index => $a_icon  )
                    <div class="col-1 text-center" id="btn_facility">
                        <label class="btn border" id="border_faci{{$index}}">
                            <img src="{{asset('/icon/'.$a_icon )}}" alt="">
                            <input type="checkbox" value="{{$index}}" id="btnCheckbox{{$index}}"
                                   name="options_facility" class="invisible" onclick="selectbtnCheckbox()">
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

            <div class="justify-content-center text-center mb-2">

                <button type="reset" class="btn btn-primary color-dark-blue-fond mt-2 border-0">ล้างค่า</button>

                <button type="submit" class="btn btn-primary mt-2 btn-light-blue text-right border-0"
                        id="comfiem_addroom">ยืนยัน
                </button>
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


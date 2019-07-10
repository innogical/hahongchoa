<style>
    .dropzone .dz-preview.dz-error:hover .dz-error-message {
        display: none;
    }
</style>

@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="color-dark-blue-fond mt-2 text-left">ประกาศห้องว่าง</h4>
        <form action="/adroom" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3 mt-2">
                    <label>ประเภทห้องเช่า</label>
                    <div class="row col-md-auto">
                        <div>
                            <label>
                                <input type="radio" name="typebuild" value="1"  required class="custom-radio mx-2">
                                Apartment
                            </label>
                            <label>
                                <input type="radio" name="typebuild" value="2" required class="custom-radio mx-2">Condo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12 mt-2">
                    <label>ชื่ออพาร์ตเมนต์/คอนโด</label>
                    <input type="text" class="form-control bg_corner" name="namecondo" required
                           placeholder="กรอกชื่ออพาร์ตเมนต์/คอนโด">
                </div>

                <div class="col-md-6 col-12 mt-2">
                    <label>ที่อยู่อพาร์ตเมนต์/คอนโด</label>
                    <input type="text" class="form-control bg_corner" name="address" required placeholder="ที่อยู่">
                </div>


                <div class="col-md-6 col-6 mt-2">
                    <label>ใกล้สถานีรถไฟฟ้า</label>
                    <select id="inputState" class="form-control bg_corner custom-select" required name="zonearea">
                        <option selected>ใกล้รถไฟฟ้า</option>
                        @foreach($bts as $index=>$namezone)
                            <option value="{{$namezone->id}}">{{$namezone->name_station}}</option>
                        @endforeach
                    </select>

                    {{--<input type="text" class="form-control" name="sizeroom" placeholder="ขนาดห้อง">--}}
                </div>

                <div class="col-md-4 col-6 mt-2">
                    <label>เหมาะสำหรับ</label>
                    <select id="inputState" class="form-control bg_corner custom-select" name="lifestyle">
                        @foreach($lifestyle as $index=> $lifestyle_name)
                            <option value="{{$index+1}}">{{$lifestyle_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-4 col-6 mt-2">
                    <label>ระยะเวลาสัญญาเช่า</label>
                    <select id="inputState" class="form-control bg_corner custom-select" name="promise">
                        <option value="1" selected>สัญญาเช่า</option>
                        @foreach($promise as $index=> $apromise)
                            <option value="{{$index+1}}">{{$apromise}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-6 mt-2">
                    <label>จุดเด่นห้อง <span class="text-danger font-weight-light" style="font-size: 12px">ตัวอักษรไม่เกิน <span
                                    id="totaltext"></span> /80 ตัวอักษร</span></label>
                    <input type="text" class="form-control  bg_corner"
                           placeholder="จุดเด่น " name="hilight"
                           id="hilight"
                           onkeyup="counttext()" maxlength="80">
                    {{--<div class="col-4 mb-2">--}}
                    {{--<p></p>--}}
                    {{--<p><span id="totaltext">0</span>/80 ตัวอักษร</p>--}}
                    {{--</div>--}}
                </div>

                <div class="col-md-12 col-12 mt-2">
                    <textarea name="detail" placeholder="รายละเอียดห้อง" class="form-control bg_corner" id="" cols="30"
                              rows="10"></textarea>
                </div>


            </div>
            <div class="row">

                <div class="col-3 mt-2 bg_corner">
                    <input type="text" class="form-control bg_corner" name="sizeroom" placeholder="ขนาดห้อง">
                </div>
                <div class="col-3 mt-2 bg_corner">
                    <input type="number" class="form-control bg_corner" placeholder="ราคา/เดือน" name="price">
                </div>
                <div class="col-3 mt-2 bg_corner">
                    <input type="text" class="form-control bg_corner" name="amoutroom" required placeholder="จำนวนห้อง">
                </div>
                <div class="form-group bg_corner col-3 mt-2">
                    <input type="number" name="amoutLife" class="form-control bg_corner" required
                           placeholder="จำนวนผู้อาศัย" style="width: 100%">
                </div>
            </div>


            <div class="col-md-12 col-12">
                <label for="">ภาพรายละเอียดห้อง</label>
                <div id="image_room" class="dropzone"
                     style="border: 2px solid #eaeaea; height: auto; border-radius: 20px;"></div>
                <input type="file" id="list_room_Images" name="file[]" value="" multiple hidden/>

            </div>
            {{--<input type="file" name="filescan" class="col-12 border mt-2 " style="height: 40px;">--}}
                <div class=" mt-2">
                    <h6 class="color-dark-blue-fond">สิ่งอำนวยความสะดวก</h6>
                </div>


            <div class="row d-flex justify-content-between">
                @foreach($icon as $index => $a_icon  )

                    <div class="col-md-2 col-2 text-center" id="btn_facility">
                        <label class="btn border bg_corner "
                               style="border-radius: 100%; width: 46px;height: 46px; padding: 8px "
                               id="border_faci{{$index}}"
                        >
                            {{--<img src="{{asset('/icon/'.$a_icon )}}"--}}
                            {{--style="height: 36px; bottom: 54px;left: 25px;" class="position-absolute">  --}}
                            <img src="{{asset('/icon/'.$a_icon )}}"
                                 style="height: 30px" width="30px">
                            <input type="checkbox" value="{{$index+1}}" id="btnCheckbox{{$index}}"
                                   name="options_facility" class="invisible"
                                   onclick="selectbtnCheckbox()">
                        </label>

                        <p class="text-black-50  font-weight-light "
                           style="font-size: 12px">{{str_replace(".svg","",$namefacility[$index])}}</p>
                    </div>
                @endforeach
                <div class="offset-md-4 offset-4"></div>

            </div>


            <div class="text-left mt-2">
                <h6 class="color-dark-blue-fond">แผนที่</h6>
            </div>
            <div id="map" style="height: 384px"></div>

            <input type="text" id="inputLat" name="lat" hidden>
            <input type="text" id="inputLng" name="lng" hidden>
            <input type="text" name="facility" id="facility" hidden>

            <div class="col-md-12 m-2">
                <div class="row">
                    <div class="d-flex justify-content-center col-12">

                        <div class="col-md-4">
                            <button type="reset" class="col btn text-black-50 bg_corner ">รีเซ็ต</button>
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

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4rGqTDO8N1hqO6JJw0nQt0aIHGZ0QRKs&callback=initMap"
    ></script>

    <script>
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#image_room", {
            url: "file/post",
            acceptedFiles: 'image/*',
            accept: function (file, done) {
                done(file.name);
            },
        });

        myDropzone.on("complete", function (file) {
            // myDropzone.files.forEach(function (item) {
            //     new File([item.name],'')
            //     arr.push(item)
            // });

            // console.log(myDropzone.files[0]);
            $('#list_room_Images')[0].files = new FileListItem(myDropzone.files);

            console.log(document.getElementById('list_room_Images').value);
            file.previewElement.addEventListener("click", function () {
                myDropzone.removeFile(file);
                $('#list_room_Images')[0].files = new FileListItem(myDropzone.files);
                // document.getElementById('bannerImg').value = arr;
                // console.log(document.getElementById('bannerImg').value);
            });

        });


    </script>

  <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection


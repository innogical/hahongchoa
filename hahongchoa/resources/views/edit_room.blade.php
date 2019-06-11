<style>

</style>

@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="color-dark-blue-fond mt-2 text-left mt-3">แก้ไขข้อมูล ห้อง{{$myRoom->name}}</h4>

        <form action="/adroom/{{$myRoom->id}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="text" name="idroom" hidden value="{{$myRoom->id}}">


            <div class="row">

                <div class="col-md-3 mt-2">
                    <label>ประเภทห้องเช่า</label>
                    <div class="row col-md-auto">
                        <div>
                            <label>

                                <input type="radio" id="type_build_1" name="typebuild" value="1"
                                       class="custom-radio mx-2" @if($myRoom->type_builder == 1) checked @endif >
                                Apartment
                            </label>

                            <label>
                                <input type="radio" id="type_build_2" name="typebuild" value="2"
                                       class="custom-radio mx-2" @if($myRoom->type_builder == 2) checked @endif>Condo
                            </label>
                        </div>
                    </div>
                </div>


                <div class="col-md-9 col-12 mt-2">
                    <label>ชื่ออพาร์ตเมนต์/คอนโด</label>
                    <input type="text" class="form-control bg_corner" name="namecondo" required
                           placeholder="ชื่ออพาร์ตเมนต์/คอนโด" value="{{$myRoom->name}}">
                </div>

                <div class="col-md-6 col-12 mt-2">
                    <label>ที่อยู่อพาร์ตเมนต์/คอนโด</label>
                    <input type="text" class="form-control bg_corner" name="address" value="{{$myRoom->address}}"
                           required placeholder="ที่อยู่">
                </div>


                <div class="col-md-6 col-6 mt-2">
                    <label>ใกล้สถานีรถไฟฟ้า</label>
                    <select id="inputState" class="form-control bg_corner custom-select" name="zonearea">
                        {{--<option value="{{$myRoom->btsstation_id}}" selected></option>--}}
                        @foreach($bts as $index=>$namezone)
                            <option value="{{$namezone->id}}"
                                    @if($myRoom->btsstation_id == $namezone->id) selected @endif>{{$namezone->name_station}}</option>
                        @endforeach
                    </select>

                    {{--<input type="text" class="form-control" name="sizeroom" placeholder="ขนาดห้อง">--}}
                </div>

                <div class="col-md-4 col-6 mt-2">
                    <label>เหมาะสำหรับ</label>
                    <select id="inputState" class="form-control bg_corner custom-select" name="lifestyle">
                        @foreach($lifestyle as $index=> $lifestyle_name)
                            <option value="{{$index+1}}" @if($myRoom->stylelife_id == $index+1) selected @endif >{{$lifestyle_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-4 col-6 mt-2">
                    <label>ระยะเวลาสัญญาเช่า</label>
                    <select id="inputState" class="form-control custom-select bg_corner" name="promise">
                        <option value="{{$myRoom->lease_id}}" selected></option>
                        @foreach($promise as $index=> $apromise)
                            <option value="{{$index+1}}">{{$apromise}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 col-6 mt-2">
                    <label>จุดเด่นของห้อง <span class="text-danger font-weight-light" style="font-size: 12px">กรุณาย่อข้อมูลไม่เกิน <span
                                    id="totaltext"></span> /80 ตัวอักษร</span></label>
                    <input type="text" class="form-control  bg_corner"
                           placeholder="จุดเด่น " name="hilight"
                           id="hilight"
                           onkeyup="counttext()" maxlength="80" value="{{$myRoom->hilight}}">
                </div>
                <div class="col-md-12 col-12 mt-2">
                    <textarea name="detail" placeholder="รายละเอียดห้อง" class="form-control bg_corner" id="" cols="30"
                              rows="10">{{$myRoom->detail}}</textarea>
                </div>


            </div>
            <div class="row">

                <div class="col-md-4 col-4 mt-2 bg_corner">
                    <label>ขนาดห้อง /ตร.ม</label>

                    <input type="text" class="form-control bg_corner" name="sizeroom" value="{{$myRoom->size}}"
                           placeholder="ขนาดห้อง">
                </div>
                <div class="col-md-4 col-4 mt-2 bg_corner">
                    <label>ราคา</label>

                    <input type="text" class="form-control bg_corner" placeholder="ราคา/เดือน"
                           value="{{$myRoom->price}}" name="price">
                </div>
                {{--<div class="col-md-4 col-4 mt-2 bg_corner">--}}
                {{--<input type="text" class="form-control bg_corner" name="amoutroom" required placeholder="จำนวนห้อง">--}}

                <div class="form-group bg_corner col-md-4 col-4 mt-2">
                    <label>จำนวนผู้อาศัย</label>
                    <input type="number" name="amoutLife" class="form-control bg_corner" value="{{$myRoom->personLive}}"
                           required
                           placeholder="จำนวนผู้อาศัย" style="width: 100%">
                </div>
            </div>


            <div class="col-md-12 col-12 mt-4">
                <label>ภาพรายละเอียดห้อง</label>
                <div id="img_drop_edit_img_detail" class="dropzone"
                     style="border: 2px solid #eaeaea; height: auto; border-radius: 20px;"></div>

                <input type="file" id="bannerImg" name="file[]" value="" multiple hidden/>
            </div>


            <div class="col-md-12 col-12">

                <div class="text-left mt-2">
                    <h6 class="color-dark-blue-fond">สิ่งอำนวยความสะดวก</h6>
                </div>

                <div class="row d-flex justify-content-between">
                    <input type="text" id="facilityofRoom" value="{{$facility_ofRoom}}" hidden>
                    @foreach($icon as $index => $a_icon  )

                        <div class="col-md-3 col-2 text-center" id="btn_facility">
                            <label class="btn border bg_corner "
                                   style="border-radius: 100%; width: 46px;height: 46px; padding: 8px "
                                   id="border_faci{{$index}}"
                            >
                                {{--<img src="{{asset('/icon/'.$a_icon )}}"--}}
                                {{--style="height: 36px; bottom: 54px;left: 25px;" class="position-absolute">  --}}
                                <img src="{{asset('/icon/'.$a_icon )}}"
                                     style="height: 30px" width="30px">
                                <input type="checkbox" value="{{$index+1}}" id="btnCheckbox{{$index+1}}"
                                       name="options_facility_edit" class="invisible"
                                       onclick="selectEditbtnCheckbox({{$index+1}})">
                            </label>
                            <p class="text-black-50  font-weight-light "
                               style="font-size: 12px">{{str_replace(".svg","",$namefacility[$index])}}</p>

                            {{--<p class="text-black-50  font-weight-light "--}}
                            {{--style="font-size: 12px">{{$namefacility[$index]}}</p>--}}
                        </div>
                    @endforeach


                    <div class="offset-md-6 offset-4"></div>

                </div>
            </div>


            <div class="col-md-12">

                <div class="text-left mt-2">
                    <h6 class="color-dark-blue-fond">แผนที่</h6>
                </div>
                <div id="map" style="height: 384px"></div>
            </div>

            <input type="text" id="inputLat" name="lat" value="{{$myRoom->lat}}" hidden>
            <input type="text" id="inputLng" name="lng" value="{{$myRoom->lng}}" hidden>
            <input type="text" name="facility" id="facility" hidden>

            <div class="col-md-12 m-2">
                <div class="row">
                    <div class="d-flex justify-content-center col-12">

                        <div class="col-md-4">
                            <button type="reset" class="col btn text-black-50  bg_corner">ล้างค่า</button>
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
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4rGqTDO8N1hqO6JJw0nQt0aIHGZ0QRKs&callback=editMap"
    ></script>


    <script>

        var keep_update_facility = [];
        getOriginal_facility();


        function getOriginal_facility() {
            var facilities = JSON.parse($('#facilityofRoom').val());

            facilities.forEach(function (item, index) {

                // console.log("border_faci" + item['facility_id']);

                // $('#border_faci' + item['facility_id']).addClass('facilities_active');
                // $('#btnCheckbox' + item['facility_id']).prop('checked', true);


                setArr_facility(item['facility_id']);


            });

        }


        function selectEditbtnCheckbox(id_facility) {

            console.log("dsaqweclikede", id_facility);

            setArr_facility(id_facility);

        }


        function setArr_facility(id_facility) {
            var chx_dataa_id = keep_update_facility.includes(id_facility);


            var index = id_facility - 1;
            if (chx_dataa_id) {

                keep_update_facility.splice(keep_update_facility.indexOf(id_facility), 1);
                $('#border_faci' + index).removeClass('facilities_active');


                console.log("false");
            } else {
                keep_update_facility.push(id_facility);
                console.log("true");
                $('#border_faci' + index).addClass('facilities_active');

            }
            console.log("border_faci" + index);

            //
            $('#facility').val(JSON.stringify(keep_update_facility));
            console.log("total id ficaility", keep_update_facility);


        }

        var type = {!! $myRoom->type_builder !!}

        getTypebulder(type);

        var value = {!! json_encode($image_ofroom_toResult) !!}

        console.log("sdqweq", value);
        if (value === undefined || value.length == 0) {
            var getImage = [];
        } else {
            var getImage = JSON.parse(JSON.stringify({!! json_encode($image_ofroom_toResult) !!}));
        }
        console.log("getImages", getImage);

        var folderimagedetail = "{!! asset('/images_rooms') !!}";


        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#img_drop_edit_img_detail", {
            url: "file/post",
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            accept: function (file, done) {
                done(file.name);
            }

            // previewTemplate: renderPreview()
        });

        getImage.forEach(function (item) {
            // var mockFile = new File([""], item.name, item.size,{ type: 'image/jpeg' });
            // var mockFile = new File([""],item.name,{type: "image/jpeg"});
            var mockFile = new File([dataURItoBlob(item.dataURI)], item.name, {type: "image/jpeg"});
            // var blob = dataURItoBlob(item.dataURI);

            // var mockFile = { name: item.name, size: item.size, type: "image/jpeg", serverID: 0, accepted: true };

            // var mockFile = dataURItoBlob(item.dataURI);

            myDropzone.files.push(mockFile);
            myDropzone.emit("addedfile", mockFile);
            myDropzone.emit("thumbnail", mockFile, folderimagedetail + "/" + item.name);
        });

        $('#bannerImg')[0].files = new FileListItem(myDropzone.files);

        console.log(myDropzone.files);

        myDropzone.on("removedfile", function (file) {
            console.log(myDropzone.files);
            $('#bannerImg')[0].files = new FileListItem(myDropzone.files);
        });

        myDropzone.on("complete", function (file) {
            // myDropzone.files.forEach(function (item) {
            //     new File([item.name],'')
            //     arr.push(item)
            // });

            console.log(myDropzone.files);
            $('#bannerImg')[0].files = new FileListItem(myDropzone.files);

            console.log($('#bannerImg')[0].files);
            // file.previewElement.addEventListener("click", function () {
            //     myDropzone.removeFile(file);
            //     $('#bannerImg')[0].files = new FileListItem(myDropzone.files);
            // });

        });

        function getTypebulder(idtype) {
            console.log("typebulder", idtype);

            // if (idtype == 1) {
            //     $('#type_build_1').checked.val()
            // }
            // else {
            //     $('#type_build_2').checked.val()
            //
            // }
        }


    </script>


    <footer class="footer">
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection


@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="col-md-12 col-12 mt-3">

            <div class="row">
                <div class="col-md-6 col-12 img-fluid mt-2 p-0" style="height: auto">
                    <img class=" w-100"
                         src="{{asset('images_rooms/'. $TotelRoom->pathimg)}}"/>
                </div>

                <div class="offset-1 col-md-5 col-12 mt-3">
                    <h5 class="font-weight-normal">{{$TotelRoom->name_typeBuilder}} {{$TotelRoom->name}}</h5>

                    <div class="box-twin-data mt-1">
                        {{--<div class="img-fluid col-1">--}}
                        {{--<img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        <div class="col p-0">
                            <p class="font-weight-light mb-0"> {{$TotelRoom->hilight}}</p>
                        </div>
                    </div>
                    <div class="row col">
                        <p class="color-dark-blue-fond">ขนาด <span>{{$TotelRoom->size}}</span>ตรม.</p>
                    </div>

                    <div class="box-twin-data row col p-0">
                        <div class="img-fluid col-1">
                            <img src="{{asset('/icon/trian.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="col p-0 ml-1">
                            <p class="text-black-50 ml-2">สถานีรถไฟฟ้าBTS{{$TotelRoom->name_station}}</p>
                        </div>
                    </div>
                    <div class="box-twin-data row mt-1">

                        <div class="col-auto">
                            <h4 class="color-dark-blue-fond font-weight-normal">{{$TotelRoom->price}}.- <span
                                        class="font-weight-light"
                                        style="font-size: 16px">/เดือน</span>
                            </h4>
                        </div>
                        {{--<hr class="col-12 ml-2">--}}
                    </div>

                    <div class="box-twin-data row mt-1">

                        <div class="col-auto">
                            <p class="color-dark-blue-fond">ประเภทสัญญาเช่า
                                <span>{{$TotelRoom->laase_duration}} เดือน</span>
                            </p>
                        </div>
                    </div>

                    <div class="row col-md col">
                        <p class="font-weight-light">รายละเอียด
                            {{$TotelRoom->detail}} </p>

                    </div>
                    {{--<hr class="col-12 ml-2">--}}

                    <div class="row">

                        <div class="box-twin-data col">

                            <p class="">เจ้าของ</p>
                            <p class="font-weight-light ">{{$TotelRoom->username}}</p>

                        </div>
                        <div class="box-twin-data col">

                            <p class="color-dark-blue-fond">ติดต่อ</p>
                            <p class=" font-weight-light">{{$TotelRoom->telephone}}</p>

                            <div class="row">
                                @if($TotelRoom->line_qrcode == null)

                                @else
                                    <a href="{{$TotelRoom->line_qrcode}}" class="btn col-4" role="button"
                                       aria-disabled="true"
                                    >
                                        <img src="{{asset('icon/line-icon.png')}}"
                                             class="w-100 h-auto" alt="">
                                    </a>

                                @endif

                                @if($TotelRoom->url_facebook == null)

                                @else
                                    <a href="{{$TotelRoom->url_facebook}}" class="btn col-4" role="button"
                                       aria-disabled="true"
                                    >
                                        <img src="{{asset('icon/facebook_circle-512.png')}}"
                                             class="w-100 h-auto"
                                             alt="phone">

                                    </a>

                                @endif

                                @if($TotelRoom->telephone == null)

                                @else
                                    <a href="tel:{{$TotelRoom->telephone}}" target="_blank" class="btn col-4"
                                       role="button"
                                       aria-disabled="true"
                                    >
                                        <img src="{{asset('icon/phon_icon.png')}}" alt="" class="w-100 h-auto">

                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--{{$img_air}}--}}
        @if($img_air == null || $img_air =="" || sizeof($img_air)== 0 )

        @else

            <div class="col-12 mt-2 p-0">
                <h4 class="text-center">ภาพบรรยากาศ</h4>

                <div class="row">
                    <div id="carouselExampleControls" class="carousel slide col-12" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($img_air->chunk(3) as $key => $silde_is)
                                @if ($key == 0)
                                    <div class="carousel-item active row">
                                        <div class="row">
                                            @foreach($silde_is as $item)
                                                <img class="d-block w-100 col-4"
                                                     src="{{asset('images_rooms/'.$item->pathimg)}}" alt="First slide"
                                                     style="width: 393px; height: 380px">
                                            @endforeach
                                        </div>
                                    </div>
                                    @continue
                                @endif
                                <div class="carousel-item row">
                                    <div class="row">
                                        @foreach($silde_is as $item)
                                            <img class="d-block w-100 col-4"
                                                 src="{{asset('images_rooms/'.$item->pathimg)}}" alt="First slide">
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                {{--<div class="col-md-12 col-12">--}}
                {{--<hr class="col-12 m-2">--}}

                {{--</div>--}}
            </div>
        @endif

        @if($mapRoom_detail_facility == null || $mapRoom_detail_facility =="" || sizeof($mapRoom_detail_facility)==0)
        @else
            <div class="col-md-12 py-3 mt-3" style="background-color: #F1F1EF">
                <h4 class="text-center">สิ่งอำนวยความสะดวก</h4>

                <div class="row h-auto mt-3">

                    @foreach($mapRoom_detail_facility as $index => $a_icon  )
                        <div class="col-md col text-center">
                            <img src="{{asset('/icon/'.$a_icon->pathImage.'.svg' )}}"
                                 class="w-50">


                            <p class="text-black-50  font-weight-light "
                               style="font-size: 12px">{{$a_icon->name}}</p>
                        </div>
                    @endforeach
                    <div class="offset-md-4 offset-4"></div>
                </div>
                {{--</div>--}}
            </div>
        @endif
        {{--</div>--}}


        <input type="text" value="{{$TotelRoom->lat}}" id="room_lat" hidden>
        <input type="text" value="{{$TotelRoom->lng}}" id="room_lng" hidden>

        {{--<hr class="col-12 ml-2">--}}
        <div class="col-md-12 my-2">

            <div class="row">
                <div class="col-md-6 col-12 mt-4">
                    <h4>ตำแหน่งที่พัก</h4>
                    <div id="roommap" style="height: 384px"
                         onload="loadDetailMap()">
                    </div>
                </div>

                <div class="col-md-6 col-12 mt-4">
                    <h4>การเดินทาง</h4>
                    <div class="col mt-3">
                        <h5 class="color-dark-blue-fond">ที่อยู่:</h5>
                        <p class="text-body font-weight-light">
                            {{$TotelRoom->address}}
                        </p>
                    </div>

                    <div class="col">
                        <div class="icon_symbol_tranfition">
                            <div class="img-fluid">
                                <img src="{{asset('/icon/trian.svg')}}" class="h-auto" style="width: 60px" alt="">
                            </div>
                            <p class="m-0">สถานี{{$TotelRoom->name_station}}<span></span>
                                ระยะทาง{{number_format($TotelRoom->distance,1,'.','')}}กิโลเมตร <span></span></p>
                            <p class="color-green">ใช้เวลา {{ substr($TotelRoom->time,0,2)}}นาที</p>
                            <a class="btn bg_corner btn_green text-white" onclick="direction_opGooglemap()">นำทาง</a>

                        </div>

                    </div>
                    {{--<div class="col">--}}
                    {{--<div class="icon_symbol_tranfition">--}}
                    {{--<div class="img-fluid">--}}
                    {{--<img src="{{asset('/icon/car_font_view.svg')}}" class="h-auto" style="width: 60px"--}}
                    {{--alt="">--}}
                    {{--</div>--}}
                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet aut cum--}}
                    {{--dolorum explicabo hic impedit laudantium maiores nam, nobis possimus quae quibusdam--}}
                    {{--quidem quos ratione recusandae rerum veniam voluptatum!</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>

            {{--@if($newRoom != [] || $newRoom != "")--}}
            {{--<div class="col-md-12">--}}
            {{--<h4>ห้องพักที่น่าสนใจ</h4>--}}
            {{--@include('layouts.card-list-room')--}}
            {{--@yield('room')--}}
            {{--</div>--}}
            {{--@endif--}}
        </div>
    </div>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9CSkZmCPxPPyZahRKqk0yfSfav1rZHxg&callback=loadDetailMap"
    ></script>




    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection
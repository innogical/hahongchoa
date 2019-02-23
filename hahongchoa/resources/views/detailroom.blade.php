@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="col-md-12 col-12">

            <div class="row">
                <div class="col-md-6 col-12 img-fluid border mt-2" style="height: auto">
                    <img class="d-block w-100"
                         src="{{asset('images_rooms/'. $TotelRoom->pathimg)}}"/>

                </div>

                <div class="offset-1 col-md-5 col-12 mt-3">
                    <h4 class="color-dark-blue-fond font-weight-normal">{{$TotelRoom->name}}</h4>

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
                            <p class="color-dark-orange-fond ml-2"> ใกล้สถานีรถไฟฟ้าBTS{{$TotelRoom->name_station}}</p>
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

                    <div class="detailroom row">
                        <div class="col">
                            <p class="font-weight-light text-body "><span class="color-dark-blue-fond">รายละเอียด</span>
                                {{$TotelRoom->detail}} </p>
                        </div>

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
                                    <a href="{{$TotelRoom->telephone}}" target="_blank" class="btn col-4" role="button"
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


        <div class="col-12 mt-2 p-0">
            <h4 class="text-center">ภาพบรรยากาศ</h4>

            <div class="row">
                <div id="carouselExampleControls" class="carousel slide col-12" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach($img_air as $a_img_air)
                                    <img class="d-block w-100 col-3"
                                         src="{{asset('/images_rooms/'.$a_img_air->pathimg)}}">
                                @endforeach
                            </div>

                        </div>
                        <div class="carousel-item row">

                            <div class="row">
                                <img class="d-block w-100 col-4" src="https://dummyimage.com/600x400/000/fff"
                                     alt="First slide">
                                <img class="d-block w-100 col-4" src="https://dummyimage.com/600x400/000/fff"
                                     alt="First slide">
                                <img class="d-block w-100 col-4" src="https://dummyimage.com/600x400/000/fff"
                                     alt="First slide">
                            </div>

                        </div>
                        <div class="carousel-item row">
                            <div class="row">
                                <img class="d-block w-100 col-4" src="https://dummyimage.com/600x400/000/fff"
                                     alt="First slide">
                                <img class="d-block w-100 col-4" src="https://dummyimage.com/600x400/000/fff"
                                     alt="First slide">
                                <img class="d-block w-100 col-4" src="https://dummyimage.com/600x400/000/fff"
                                     alt="First slide">
                            </div>

                        </div>
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

        </div>
        <hr class="col-12 ml-2">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h4 class="text-center">สิ่งอำนวยความสะดวก</h4>

                    <div class="row bg_facility col d-flex justify-content-between">
                        @foreach($mapRoom_detail_facility as $a_facility)
                            <div class=" border img_facility">
                                <img src="{{asset('/icon/'.$a_facility->pathImage.".svg")}}" alt=""
                                     style="width: 60px; height: auto; padding: 8px">
                            </div>
                        @endforeach

                    </div>
                </div>


            </div>

            <input type="text" value="13.8192362" id="room_lat" hidden>
            <input type="text" value="100.0573583" id="room_lng" hidden>

            {{--<hr class="col-12 ml-2">--}}
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6 col-12 mt-4">
                        <h4>ตำแหน่งที่พัก</h4>
                        <script>
                            var lat;
                            var lng;

                            lat = {!! $TotelRoom->lat !!};
                            lng = {!! $TotelRoom->lng !!};
                            console.log("sadqwe" + lng)
                        </script>
                        <div id="roommap" style="height: 384px"
                             onload="loadDetailMap(lat,lng)">
                        </div>
                    </div>

                    <div class="col-md-6 col-12 mt-4">
                        <h4>การเดินทาง</h4>
                        <div class="col">
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
                                <p>สถานี{{$TotelRoom->name_station}}<span></span>
                                    ระยะทาง{{number_format($TotelRoom->distance,1,'.','')}}กิโลเมตร <span></span></p>
                                <p class="color-green">ใช้เวลา {{ substr($TotelRoom->time,0,2)}}นาที</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="icon_symbol_tranfition">
                                <div class="img-fluid">
                                    <img src="{{asset('/icon/car_font_view.svg')}}" class="h-auto" style="width: 60px"
                                         alt="">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet aut cum
                                    dolorum explicabo hic impedit laudantium maiores nam, nobis possimus quae quibusdam
                                    quidem quos ratione recusandae rerum veniam voluptatum!</p>
                            </div>
                        </div>
                    </div>
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
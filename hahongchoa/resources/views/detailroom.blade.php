@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-6 img-fluid border mt-2" style="height: 538px">
                <img class="d-block w-100"
                     src="{{asset('images_rooms/image4.jpg')}}"
                {{--<img src="" alt="">--}}

            </div>
        </div>

        <div class="col-6 mt-2">
            <h4 class="color-dark-blue-fond">พิทักษ์แมนชั่น</h4>

            <div class="box-twin-data row mt-1">
                <div class="img-fluid col-1">
                    <img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">
                </div>
                <div class="col  p-0 ml-1">
                    <p class="color-light-blue-fond "> ทำเลตั้งอยู่ด้านหลัง Gateway</p>
                </div>
            </div>

            <div class="box-twin-data row mt-1">
                <div class="img-fluid col-1">
                    <img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">
                </div>
                <div class="col p-0 ml-1">
                    <p class="color-dark-orange-fond">2000</p>
                </div>
            </div>

            <div class="box-twin-data row mt-1">
                <div class="col-1">
                    <p class="color-dark-blue-fond">ขนาด</p>
                </div>
                <div class="col p-0 ml-2">
                    <p class="color-light-blue-fond "> 22 ตรม.</p>
                </div>
            </div>

            <div class="box-twin-data row mt-1">

                <div class="col-auto">
                    <p class="color-dark-blue-fond">ประเภทสัญญาเช่า</p>
                </div>

                <div class="col p-0 ml-2">
                    <p class="color-light-blue-fond ">6เดือน</p>
                </div>
                <hr class="col-12 ml-2">
            </div>

            <div class="detailroom row">
                <div class="col">
                    <p class="color-light-blue-fond "><span class="color-dark-blue-fond">รายละเอียด</span>
                        ติดถนนเพชรเกษม ซอย 48แยก 21
                        ห้องพักกว้างขนาด 35 ตรม. การเดินทางสะดวกสบาย ใกล้สถานีรถไฟฟ้า หน้าปากซอยมีรถสองแถวบริการตลอดซอย
                        ซอยนี้สามารถทลุไปถึงบางหว้า จรัญสมิทวงศ์ กาญจนาภิเษก ห้องพักสะอาด สะดวก สบาย กว้างขวาง ราคาถูก
                        ปลอดภัย มีประตูคีย์การด์ และที่จอดรถ เครื่องซักผ้าหยอดเหรียญ </p>
                </div>

            </div>
            <hr class="col-12 ml-2">


            <div class="box-twin-data row mt-1">

                <div class="col-auto">
                    <p class="color-dark-blue-fond">เจ้าของ</p>
                </div>

                <div class="col p-0 ml-2">
                    <p class="color-light-blue-fond ">คุณทดสอบ ทดลองใช้</p>
                </div>

            </div>
            <div class="">
                <a href="#" class="btn" role="button" aria-disabled="true"
                   style="background-color: #00B900; color: white">Line</a>
                <a href="#" class="btn" role="button" aria-disabled="true"
                   style="background-color:#4267B2; color: white">Facebook</a>
                <a href="#" class="btn" role="button" aria-disabled="true"
                   style="border-color: #F44D31; color: #6ECCD6">083-5497286</a>
            </div>
        </div>
        <div class="col-12">

            <div class="row">

                <div id="carouselExampleControls" class="carousel slide col-12" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <img class="d-block w-100 col-3" src="https://dummyimage.com/600x400/000/fff"
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
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <hr class="col-12 ml-2">

    <div class="col-12">
        <div class="box-twin-data row mt-1">
            <div class="img-fluid">
                <img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">
            </div>
            <div class="col p-0 ml-2">
                <p class="color-dark-orange-fond"> ทำเลตั้งอยู่ด้านหลัง Gateway</p>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">

            <div class="col-12">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home"
                           aria-selected="true">สิ่งอำนวยความสะดวก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">การเดินทาง</a>
                    </li>

                </ul>

            </div>
            <div class="col-12 mt-2">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="col-1">
                            <img class="border " src="{{asset('icon/wifi.svg')}}" alt="" width="30px" height="30px">
                            <div class="text-justify">
                                wifi
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="col-12">

                            <div class=" row">
                                <div class="col-6">
                                    <div class="row">

                                        <div class="col-auto">
                                            <img src="{{asset('icon/skytrian.svg')}}" alt="" width=40px"
                                                 height="40px"
                                                 class="border">
                                        </div>
                                        <div class="">
                                            <p class="color-light-blue-fond ">
                                                <span class="color-dark-blue-fond">สถานี</span>
                                                บางหว้า ห่างประมาณ 200 เมตร
                                            </p>
                                            <p class="color-light-blue-fond ">
                                                <span class="color-dark-blue-fond">ใช้เวลาประมาณี</span>
                                                15นาที
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="row">

                                        <div class="col-auto">
                                            <img src="{{asset('icon/havecar.svg')}}" alt="" width=40px"
                                                 height="40px"
                                                 class="border">
                                        </div>
                                        <div class="">
                                            <p class="color-light-blue-fond "> เดินทางด้วยรถยนต์ส่วนตัว: 12 นาที</p>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>


                </div>
            </div>
        </div>

        <input type="text" value="13.8192362" id="room_lat" hidden>
        <input type="text" value="100.0573583" id="room_lng" hidden>

        <hr class="col-12 ml-2">
        <div id="roommap" style="height: 384px" onload="loadDetailMap(13.8192362,100.0573583)"></div>

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
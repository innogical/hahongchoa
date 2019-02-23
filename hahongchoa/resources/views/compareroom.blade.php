@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-md-12">
            <div class="row m-2 d-flex justify-content-between">
                <div class="col-md-3 col-3 bg_corner border p-2">
                    <p class="text-center">อพาร์ตเมนต์/คอนโด</p>
                    <div class="card-img">
                        <div class="" style="background-color: #0b2e13; width: 100%; height: 100px"></div>
                    </div>
                    <p>ขนาดห้อง</p>
                    <p>ราคา/เดือน</p>
                    <p>ที่อยู่</p>
                    <p>จุดเด่น</p>
                    <p>สิ่งอำนวยความสะดวก</p>
                    <p>การเดินทาง</p>
                    <p>ระยะเวลาสัญญา</p>


                </div>
                <div class="col-md-3 col-3 bg_corner border p-2">
                    <p class="text-center">{{$room1->name}}</p>
                    <div class="card-img">
                        <div class="" style="background-color: #0b2e13; width: 100%; height: 100px"></div>
                    </div>
                    <p>{{$room1->size}}</p>
                    <p>{{$room1->price}}</p>
                    <p>{{$room1->address}}</p>
                    <p>{{$room1->hilight}}</p>
                    <p>สิ่งอำนวยความสะดวก</p>
                    <p>การเดินทาง</p>
                    <p>ระยะเวลาสัญญา</p>
                    <button type="submit" class="btn btn_green col-md-12 text-white bg_corner">ติดต่อห้องเช่า</button>
                </div>

                <div class="col-md-3 col-3 bg_corner border p-2">
                    <p class="text-center">n{{$room2->name}}</p>
                    <div class="card-img">
                        <div class="" style="background-color: #0b2e13; width: 100%; height: 100px"></div>

                    </div>
                    <p>{{$room2->size}}</p>
                    <p>{{$room2->price}}</p>
                    <p>{{$room2->address}}</p>
                    <p>{{$room2->hilight}}</p>
                    <p>สิ่งอำนวยความสะดวก</p>
                    <p>การเดินทาง</p>
                    <p>ระยะเวลาสัญญา</p>
                    <button type="submit" class="btn btn_green col-md-12 text-white bg_corner">ติดต่อห้องเช่า</button>

                </div>


            </div>
        </div>
    </div>


    {{--<footer>--}}
    {{--@include('layouts.footer')--}}
    {{--@yield('footer')--}}
    {{--</footer>--}}
@endsection


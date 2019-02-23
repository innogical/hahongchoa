@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-md navbar-light p-1 bg-light shadow" style="padding: 0;height: auto">
        <div class="container">
            <div class="col-md-12 col-12">
                <form action="/roomnearskytrian" method="post" class="form-group">
                    @csrf
                    <div class="row mt-2">
                        <lable class="mt-2">ราคา</lable>
                        <div class="col-md-2 col-2">
                            <input type="text" class="bg_corner border form-control"
                                   value="{{$price_low}}">
                        </div>
                        <lable class="mt-2">ถึง</lable>
                        <div class="col-md-2 col-2">
                            <input type="text" class=" bg_corner border form-control"
                                   value="{{$price_high}}">
                        </div>

                        <lable class="mt-2">จำนวนผู้อาศัย</lable>
                        <div class="col-md-1 col-1">
                            <select id="inputState" class=" bg_corner border "
                                    name="person_live">
                                <option value="{{$person_live}}" selected> {{$person_live}} คน</option>
                                <option value="1"> 1คน</option>
                                <option value="2"> 2คน</option>
                                <option value="3"> 3คน</option>
                                <option value="4"> 4คน</option>
                                <option value="5"> 5คน</option>
                            </select>
                        </div>

                        @if($zone_bts == [] || $zone_bts == null || $zone_bts == "" || $area_zone == null || $area_zone == "")


                        @else
                            <lable class="mt-2">สถานี</lable>
                            <div class="col-md-1 col-1">

                                <select id="inputState" class="form-control bg_corner border col-md-12 col-12"
                                        name="area_zone">
                                    <option value="{{$area_zone}}" selected>{{$area_zone}}</option>
                                    @foreach($zone_bts as $a_zone)
                                        <option value="{{$a_zone->id}}">{{$a_zone-> name_station }}</option>
                                    @endforeach
                                </select>
                            </div>

                        @endif

                        <div class="col-md-2 col-2">
                            <lable class="">พาหนะ</lable>

                            <input type="text" value="{{$optioncar}}" hidden id="optioncar">

                            <label class="btn border" id="radio_car0">
                                <img src="{{asset('/icon/nocar.svg' )}}" alt="nocar">
                                <input type="radio" value="nothavecar"
                                       name="optioncar" class="invisible" onclick="optionCar()">
                            </label>

                            <label class="btn border" id="radio_car0">
                                <img src="{{asset('/icon/havecar.svg' )}}" alt="havecar">
                                <input type="radio" value="havecar"
                                       name="optioncar" class="invisible" onclick="optionCar()">
                            </label>

                        </div>


                        <button type="submit" class="btn col-md-2 btn_green bg_corner text-white" style="height: 40px">
                            {{--<img src="{{asset('/icon/search.svg')}}" style="width: 30px; height: auto;" alt="">--}}
                            ค้นหาห้อง
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </nav>

    <div class="container">
        {{--<div class="col-md-12">--}}
        {{--<div class="row mt-2">--}}
        <div class="col-md-12 col-12">
            <div class="d-flex justify-content-md-between mt-2">
                <div class="row">
                    <h4 class="color-dark-blue-fond">ผลการค้นหา</h4>
                    <h5 class="p-1 ml-3">{{count($result)}} ห้อง</h5>
                </div>
                @include('component.optionsearch')
                @yield('optionbarsearch')
            </div>
        </div>


        <div class="offset-md-8 offset-8 col-md-4  col-4">
            <form action="/roomnearskytrian/sortresult" method="post" class="form-group m-0">
                @csrf
                <div class="bg_corner bg_popver_filter col-md-12 col-12 p-2" id="show_option_filter">

                    <div class="" hidden>
                        <input type="text" value="{{$price_low}}" name="price_low">
                        <input type="text" value="{{$price_high}}" name="price_high">
                        <input type="text" value="{{$person_live}}" name="person_live">
                        <input type="text" value="{{$area_zone}}" name="area_zone">
                        <input type="text" value="{{$optioncar}}" name="optioncar">
                        <input type="text" value="{{$lifestyle_location}}" name="lifestyleplace">

                    </div>


                    <h5>ระยะทาง</h5>
                    <div class="row">
                        <input type="text" value="{{$result}}" hidden name="dataAll">
                        <div class="form-check radio">
                            <input type="radio" name="sortDistnce" value="distaceAsc">
                            <label class="form-check-label" for="exampleCheck1">ใกล้ไปไกล</label>
                        </div>
                        <div class="form-check radio">
                            <input type="radio" name="sortDistnce" value="distaceDesc">
                            <label class="form-check-label" for="exampleCheck1">ไกลถึงใกล้</label>
                        </div>
                    </div>

                    <h5>ราคา</h5>
                    <div class="row">

                        <div class="form-check radio">
                            <input type="radio" name="sortPrice" value="priceLow">
                            <label class="form-check-label" for="exampleCheck1">ราคาถูกถึงแพง</label>
                        </div>
                        <div class="form-check radio">
                            <input type="radio" name="sortPrice" value="priceHigh">
                            <label class="form-check-label" for="exampleCheck1">ราคาแพงถึงถูก</label>
                        </div>
                    </div>
                    <button type="submit" class=" btn btn-primary col-md-6 d-block ">ยืนยัน</button>

                </div>
            </form>

        </div>


        {{--<div class="row">--}}

        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}


        <div class="col-md-12 col-12">

            <div class="row">
                @include('component.card-list-smartsearch')
                @yield('cardzone')
            </div>
        </div>
    </div>

    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
    <script src="{{asset('/js/sortoption.js')}}"></script>
    <script>


        $(document).ready(function () {

            smartSearch();
            var objectData = {!! $result !!}
            console.log(objectData)
        });
    </script>


@endsection
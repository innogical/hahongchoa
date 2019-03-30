@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-md navbar-light p-1 bg-light shadow_box" style="padding: 0;height: auto">
        <div class="container screen_desktop p-0">
            <div class="col-md-12 col-12 screen_desktop">
                <form action="/roomnearskytrian" method="post" class="form-group ">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md">

                            <input type="text" name="lifestyleplace" id="lifestyle_location_hidden"
                                   class="p-2 col-8 border-0 shadow_box  bg_corner mt-2"
                                   placeholder="สถานที่ทำงาน / มหาวิทยาลัย" value="{{$lifestyle_location}}"
                                   style="padding: 10px" hidden>

                            <lable class="mt-2">ราคา</lable>
                            <div class="col-md col-8 p-0">
                                <input type="text" class="bg_corner border form-control bg_corner shadow_box"
                                       value="{{$price_low}}" name="price_low">
                            </div>
                        </div>

                        <input type="text" name="stat_search_option" hidden value="{{$stat_search_option}}">

                        <div class="col-md">
                            <lable class="mt-2">ถึง</lable>
                            <div class="col-md col-8 p-0">
                                <input type="text" class=" bg_corner bg_corner border form-control shadow_box"
                                       value="{{$price_high}}" name="price_high">
                            </div>
                        </div>

                        <div class="col-md">
                            <lable>ผู้อาศัย</lable>
                            <div class="col-md col-8 p-0">

                                <select id="inputState" class=" bg_corner border custom-select bg_corner shadow_box"
                                        name="person_live">
                                    <option value="1" @if($person_live ==1) selected @endif> 1คน</option>
                                    <option value="2" @if($person_live ==2) selected @endif> 2คน</option>
                                    <option value="3" @if($person_live ==3) selected @endif> 3คน</option>
                                    <option value="4" @if($person_live ==4) selected @endif> 4คน</option>
                                    <option value="5" @if($person_live ==5) selected @endif> 5คน</option>
                                </select>
                            </div>
                        </div>


                        @if($zone_bts == [] || $zone_bts == null || $zone_bts == "" || $station_bts =="")


                        @else
                            <div class="col-md">

                                <lable class="">สถานีรถไฟฟ้า</lable>
                                {{--<div class="col-md-8 col-8 p-0">--}}

                                <select id="inputState"
                                        class="form-control  custom-select bg_corner border col-md-12 col-12 shadow_box"
                                        name="area_zone">
                                    {{--<option value="{{$area_zone}}" selected>{{$area_zone}}</option>--}}
                                    @foreach($zone_bts as $a_zone)
                                        <option value="{{$a_zone->id }}"
                                                @if($a_zone->id == $station_bts) selected @endif>{{$a_zone-> name_station }}</option>
                                    @endforeach
                                </select>
                                {{--</div>--}}
                            </div>

                        @endif

                        <div class="col-md">
                            <lable>การเดินทาง</lable>
                            <select name="optioncar" id="" class="bg_corner border shadow_box custom-select" required>
                                <option value="havecar" @if($optioncar =="havecar") selected @endif>มีรถส่วนตัว
                                </option>
                                <option value="nothavecar" @if($optioncar =="nothavecar") selected @endif>
                                    ไม่มีรถส่วนตัว
                                </option>
                            </select>
                            </label>
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn_green bg_corner text-white w-100"
                                    onclick="getLocationlift()"
                                    style="height: 40px">
                                ค้นหาห้อง
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </nav>

    <div class="container mt-3">
        {{--<div class="col-md-12">--}}
        {{--<div class="row mt-2">--}}
        {{--<div class="col-md-12 col-12">--}}
        <div class="d-flex justify-content-between">
            {{--<div class="row">--}}
            <div class="">
                <h4 class="color-dark-blue-fond font-weight-light">ผลการค้นหา <span
                            class=" font-weight-light">{{count($result)}} ห้อง</span></h4>
            </div>
            @include('component.optionsearch')
            @yield('optionbarsearch')
            {{--</div>--}}
            {{--</div>--}}

        </div>


        <div class="offset-md-8  offset-2 col-md-4 col-10">
            <form action="/roomnearskytrian/sortresult" method="post" class="form-group m-0">
                @csrf
                <div class="bg_corner bg_popver_filter col-md-12 col-12 p-2" id="show_option_filter">
                    <div class="" hidden>
                        <input type="text" value="{{$price_low}}" name="price_low">
                        <input type="text" value="{{$price_high}}" name="price_high">
                        <input type="text" value="{{$person_live}}" name="person_live">
                        {{--<input type="text" value="{{$area_zone}}" name="area_zone">--}}
                        <input type="text" value="{{$optioncar}}" name="optioncar">
                        <input type="text" value="{{$stat_search_option}}" name="stat_search_option">
                        <input type="text" value="{{$lifestyle_location}}" name="lifestyleplace">

                    </div>

                    <h6 class="m-2">เรียงลำดับระยะทาง</h6>
                    <div class="row">
                        <input type="text" value="{{$result}}" hidden name="dataAll">
                        <div class="form-check radio">
                            <input type="radio" name="sortDistnce" required class="custom-radio" value="distaceAsc">
                            <label class="form-check-label font-weight-light" for="exampleCheck1">ใกล้ไปไกล</label>
                        </div>
                        <div class="form-check radio">
                            <input type="radio" name="sortDistnce"required  class="custom-radio" value="distaceDesc">
                            <label class="form-check-label font-weight-light" for="exampleCheck1">ไกลถึงใกล้</label>
                        </div>
                    </div>

                    <h6 class="m-2">เรียงลำดับราคา</h6>
                    <div class="row">
                        <div class="form-check radio">
                            <input type="radio" name="sortPrice" required value="priceLow">
                            <label class="form-check-label font-weight-light" for="exampleCheck1">ราคาถูกถึงแพง</label>
                        </div>
                        <div class="form-check radio">
                            <input type="radio" name="sortPrice"required value="priceHigh">
                            <label class="form-check-label font-weight-light" for="exampleCheck1">ราคาแพงถึงถูก</label>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center m-2">
                        <button type="submit"
                                class=" btn bg_corner btn_green col-md-6 d-block text-white font-weight-light">ยืนยัน
                        </button>
                    </div>

                </div>
            </form>

        </div>
        <div class="col-md-12 col-12 p-0">

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
            console.log(objectData);


            $('#lifestyle_location_hidden').val()
        });

        function getLocationlift() {
            var location = $('#input_real_lifestyle').val();
            console.log("location" + $('#input_real_lifestyle').val());

            $('#lifestyle_location_hidden').val(location);
        }
    </script>


@endsection
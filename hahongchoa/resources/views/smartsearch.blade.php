@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-md navbar-light p-1 bg-light shadow" style="padding: 0;height: auto">
        <div class="container" style="padding: 0">
            <div class="col-md-12" style="height: 80px;">
                <form action="/roomnearskytrian" method="post" class="form-group">
                    @csrf
                    <div class="row ">

                        <input type="text" class="col-md-2 bg_corner border form-control" value="{{$price_low}}">
                        <input type="text" class="col-md-2 bg_corner border form-control" value="{{$price_high}}">
                        {{--<input type="text" value="{{$price_low}}" class="bg_corner border " name="price_low"--}}
                        {{--style="height: 40px">--}}
                        {{--<div class="card-body col-2 p-0">--}}
                        {{--<div class="border m-2">--}}
                        {{--<div class="col-auto">--}}
                        {{--ราคาเริ่มต้น--}}
                        {{--</div>--}}
                        {{--<input type="text" value="{{$price_low}}" class=" border-0 " name="price_low"--}}
                        {{--style="height: 40px">--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="card-body col-2 p-0">--}}
                        {{--<div class="row border">--}}
                        {{--<div class="col-auto  ">--}}
                        {{--ถึง--}}
                        {{--</div>--}}
                        {{--<input type="text" value="{{$price_high}}" class="col-6 border-0" name="price_high"--}}
                        {{--style="height: 40px">--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="card-body col-1 p-0">--}}

                        {{--<div class="border">--}}
                        <select id="inputState" class="form-control bg_corner border col-md-2" name="person_live">
                            <option value="{{$person_live}}" selected>{{$person_live}}</option>
                            <option value="1">1คน</option>
                            <option value="2">2คน</option>
                            <option value="3">3คน</option>
                            <option value="4">4คน</option>
                            <option value="5">5คน</option>
                        </select>
                        {{--<div class="mt-2">--}}
                        {{--คน--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="card-body col-2 p-0">--}}
                        {{--<div class=" border ">--}}


                        @if($zone_bts == [] || $zone_bts == null || $zone_bts == "" || $area_zone == null || $area_zone == "")

                        @else
                            <select id="inputState" class="form-control col bg_corner border col-md-2" name="area_zone">
                                <option value="{{$area_zone}}" selected>{{$area_zone}}</option>
                                @foreach($zone_bts as $a_zone)
                                    <option value="{{$a_zone->id}}">{{$a_zone-> name_station }}</option>
                                @endforeach
                            </select>

                        @endif

                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<select class="form-control" name="sortprice">--}}
                        {{--<option value="low"> ราคาถูก ถึง แพง</option>--}}
                        {{--<option value="high">ราคาแพง ถึง ถูก</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--<select class="form-control" name="sortdistance">--}}
                        {{--<option value="near">ใกล้ถึงไกล</option>--}}
                        {{--<option value="far">ไกลถึงใกล้</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}


                        <div class="col-md-2">
                            <div class="row">
                                <input type="text" value="{{$optioncar}}" hidden id="optioncar">
                                <div class="ml-2">

                                    <label class="btn border" id="radio_car0">
                                        <img src="{{asset('/icon/nocar.svg' )}}" alt="nocar">
                                        <input type="radio" value="nothavecar"
                                               name="optioncar" class="invisible" onclick="optionCar()">
                                    </label>
                                </div>
                                <div class="">

                                    <label class="btn border" id="radio_car0">
                                        <img src="{{asset('/icon/havecar.svg' )}}" alt="havecar">
                                        <input type="radio" value="havecar"
                                               name="optioncar" class="invisible" onclick="optionCar()">
                                    </label>

                                </div>
                            </div>
                        </div>


                        {{--<button type="submit" class="btn btn_green bg_corner text-white" style="height: 40px">--}}
                        {{--<img src="{{asset('/icon/search.svg')}}" style="width: 30px; height: auto;" alt="">--}}
                        {{--ค้นหาห้องว่างใกล้คุณ--}}
                        {{--</button>--}}
                    </div>

                </form>

            </div>
        </div>

    </nav>

    <div class="container">
        <div class="col-md-12">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="row">
                        <h4 class="color-dark-blue-fond">ผลการค้นหา</h4>
                        <h6>{{count($result)}} ห้อง</h6>
                    </div>
                </div>

                <div class=" mt-2">
                    @include('component.optionsearch')
                    @yield('optionbarsearch')
                </div>
            </div>


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

    <script>
        $(document).ready(function () {
            smartSearch()
        });
    </script>


@endsection
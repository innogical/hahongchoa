@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-md navbar-light p-1 bg-light shadow" style="padding: 0;height: auto">
        <div class="container" style="padding: 0">
            <div class="col align-content-center" style="height: 80px;">
                <form action="/ห้องเช่าติดรถไฟฟ้า" method="post">
                    @csrf
                    <div class="row mt-1">
                        <div class="card-body col-2 p-0">
                            <div class="row border m-2">
                                <div class="col-auto">
                                    ราคาเริ่มต้น
                                </div>
                                <input type="text" value="{{$price_low}}" class="col-4 border-0" name="price_low"
                                       style="height: 40px">
                            </div>
                        </div>

                        <div class="card-body col-2 p-0">
                            <div class="row border m-2">
                                <div class="col-auto  ">
                                    ถึง
                                </div>
                                <input type="text" value="{{$price_high}}" class="col-6 border-0" name="price_high"
                                       style="height: 40px">
                            </div>
                        </div>

                        <div class="card-body col-1 p-0">

                            <div class="row border m-2">
                                <select id="inputState" class="form-control" name="person_live">
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
                            </div>
                        </div>


                        <div class="card-body col-2 p-0">
                            <div class=" border m-2 ">
                                <select id="inputState" class="form-control col" name="area_zone">
                                    {{--<option value="{{$area_zone}}" selected>{{$area_zone}}</option>--}}
                                    @foreach($zone_bts as $a_zone)
                                        <option value="{{$a_zone->id}}">{{$a_zone-> name_station }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="sortprice">
                                <option value="low"> ราคาถูก ถึง แพง</option>
                                <option value="high">ราคาแพง ถึง ถูก</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="sortdistance">
                                <option value="near">ใกล้ถึงไกล</option>
                                <option value="far">ไกลถึงใกล้</option>
                            </select>
                        </div>
                    </div>


                    <div class="card-body col-1 p-0 ml-0 mr-0">
                        <input type="text" value="{{$optioncar}}" hidden id="optioncar">
                        <div class="row  mt-2">
                            <div class="">
                                <label class="btn border" id="radio_car0">
                                    <img src="{{asset('/icon/nocar.svg' )}}" alt="nocar">
                                    <input type="radio" value="nothavecar"
                                           name="optioncar" class="invisible" onclick="optionCar()">
                                </label>

                            </div>
                            <div class="ml-2">
                                <label class="btn border" id="radio_car1">
                                    <img src="{{asset('/icon/havecar.svg' )}}" alt="havecar">
                                    <input type="radio" value="havecar"
                                           name="optioncar" class="invisible" onclick="optionCar()">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn color-higiht-orange-btn" style="height: 40px">
                            <img src="{{asset('/icon/search.svg')}}" style="width: 30px; height: auto;" alt="">
                            ค้นหาห้องว่างใกล้คุณ
                        </button>
                    </div>
            </div>

            </form>

        </div>
        </div>

    </nav>

    @include('component.card-list-smartsearch')
    <div class="container">
        <div class="col">
            <div class="row">

                <div class=" mt-2">
                    <h4 class="color-dark-blue-fond">ผลการค้นหา</h4>
                </div>
                {{--<div class=" mt-2">--}}
                {{--@include('component.optionsearch')--}}
                {{--@yield('optionbarsearch')--}}
                {{--</div>--}}
            </div>


            <div class="row">
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
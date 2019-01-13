@extends('layouts.app')
@section('content')

    <nav class="navbar navbar-expand-md navbar-light p-1 bg-light shadow" style="padding: 0;height: auto">
        <div class="container" style="padding: 0">
            <div class="col-12">
                <form action="/search" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class=" col-1">
                            <p class="color-dark-blue-fond mt-3">คำค้นหา</p>
                        </div>
                        <input type="text" name="wordsearch" class="border-0 col-6 shadow mt-2"
                               placeholder="สถานที่ทำงาน / มหาวิทยาลัย" value="{{$lifestyle_location}}"
                               style="height: 40px">
                    </div>

                    <div class="row mt-1 justify-content-center">
                        <div class="card-body col-2  ">
                            <div class="row border mt-2">
                                <div class="col-auto  mt-2">
                                    ราคาเริ่มต้น
                                </div>
                                <input type="text" value="{{$price_low}}" class="col-4 border-0" name="start_price"
                                       style="height: 40px">
                            </div>
                        </div>

                        <div class="card-body col-2  ">
                            <div class="row border mt-2">
                                <div class="col-auto  mt-2">
                                    ราคาสูงสุด
                                </div>
                                <input type="text" value="{{$price_high}}" class="col-4 border-0" name="end_price"
                                       style="height: 40px">
                            </div>
                        </div>

                        <div class="card-body col-2  ">
                            <div class="row border mt-2">
                                <div class="col-auto  mt-2">
                                    จำนวนคน
                                </div>
                                <input type="text" value="{{$person_live}}" class="col-4 border-0" name="people_life"
                                       style="height: 40px">
                            </div>
                        </div>


                        <div class="card-body col-2  ">
                            <div class="row border mt-2">
                                <select id="inputState" class="form-control col" name="zone">
                                    {{--@foreach($zone as $index=> $zone_name)--}}
                                    <option value="{{$area_zone}}" selected>{{$area_zone}}</option>
                                    {{--<option value="{{$index+1}}">{{$zone_name}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>
                        </div>


                        <div class="card-body col-2 pl-0 pr-0 ml-0 mr-0">
                            <input type="text" value="{{$optioncar}}" hidden id="chose_optioncar" onload="">
                            <div class="row  mt-2 justify-content-center">
                                <div class="">
                                    <label class="btn border" id="radio_car0">
                                        <img src="{{asset('/icon/nocar.svg' )}}" alt="">
                                        <input type="radio" value="nothavecar"
                                               name="optioncar" class="invisible" onclick="optionCar()">
                                    </label>

                                </div>
                                <div class="ml-2">
                                    <label class="btn border" id="radio_car0">
                                        <img src="{{asset('/icon/havecar.svg' )}}" alt="">
                                        <input type="radio" value="nothavecar"
                                               name="optioncar" class="invisible" onclick="optionCar()">
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{--@endforeach--}}
                        <div class="card-body col-1 mt-2 ">
                            <button type="submit" class="btn color-higiht-orange-btn" style="height: 40px">ค้นหา
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
            <div class="text-left mt-2">
                <h4 class="color-dark-blue-fond">ผลการค้นหา</h4>
            </div>
            <div class="row">

                {{--@for($i = 0; $i <6; $i++)--}}
                @yield('cardzone')
                {{--@endfor--}}

            </div>
        </div>
    </div>
    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
    <script>
        window.onload = smartSearch();
    </script>


@endsection
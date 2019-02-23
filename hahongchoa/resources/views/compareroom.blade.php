@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-md-12">

            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                    <th>อพาร์ตเมนต์/คอนโด</th>
                    <th>{{$aroom_1->name}}</th>
                    <th>{{$aroom_2->name}}</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-center">
                    <td>
                        {{$img_room1->pathimg}}
                    </td>
                    <td>
                        <div class="card-img">
                            <img src="{{asset('/images_rooms/'.$img_room1['imageRoom']->pathimg)}}" class="w-75" alt="">
                        </div>
                    </td>
                    <td>
                        <div class="card-img">
                            <img src="{{asset('/images_rooms/'.$img_room2['imageRoom']->pathimg)}}" class="w-75" alt="">
                        </div>
                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        ขนาด
                    </td>
                    <td>
                        {{$aroom_1->size}}
                    </td>
                    <td>
                        {{$aroom_2->size}}

                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        ราคา/เดือน
                    </td>
                    <td>
                        {{$aroom_1->price}}
                    </td>
                    <td>
                        {{$aroom_2->price}}

                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        ที่อยู่
                    </td>
                    <td>
                        {{$aroom_1->address}}
                    </td>
                    <td>
                        {{$aroom_2->address}}

                    </td>

                </tr>
                {{--<tr class="text-center">--}}
                    {{--<td>--}}
                        {{--สิ่งอำนวยความสะดวก--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{$aroom_1->hilight}}--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{$aroom_2->hilight}}--}}

                    {{--</td>--}}

                {{--</tr>--}}
                <tr class="text-center">
                    <td>
                        สิ่งอำนวยความสะดวก
                    </td>
                    <td>
                        <div class="row">
                            @foreach($facilityOfroom_1 as $f_room1_a)
                                <div class="col">
                                    <img class=" h-auto" style="width: 30px"
                                         src="{{asset('/icon/'.$f_room1_a->pathImage.".svg")}}"
                                         alt="">
                                    <p>{{$f_room1_a->name}}</p>
                                </div>
                            @endforeach

                        </div>
                    </td>

                    <td>

                        <div class="row">
                            @foreach($facilityOfroom_2 as $f_room2_a)
                                <div class="col">
                                    <img class=" h-auto" style="width: 30px"
                                         src="{{asset('/icon/'.$f_room2_a->pathImage.".svg")}}"
                                         alt="">
                                    <p>{{$f_room2_a->name}}</p>
                                </div>
                            @endforeach

                        </div>
                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        ระยเวลาสัญญา
                    </td>
                    <td class="text-center">
                        <p>{{$img_room1->lease}}</p>
                    </td>

                    <td class="text-center">
                        <p>{{$img_room2->lease}}</p>
                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                    </td>
                    <td>
                      <button class="btn btn_green text-white">ติดต่อห้องเช่า</button>
                    </td>

                    <td>
                        <button class="btn btn_green text-white">ติดต่อห้องเช่า</button>

                    </td>

                </tr>


                </tbody>
            </table>

        </div>
    </div>


    {{--<footer>--}}
    {{--@include('layouts.footer')--}}
    {{--@yield('footer')--}}
    {{--</footer>--}}
@endsection


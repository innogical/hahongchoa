@extends('layouts.app')
@section('content')

    <div class="container p-0">

        <div class="col-md-12 col-12">
            <table class="col table table-striped">
                <thead>
                <tr class="col px-0 text-center">
                    <th class="px-0">อพาร์ตเมนต์/คอนโด</th>
                    <th class="font-weight-light px-1">{{$aroom_1->name}}</th>
                    <th class="font-weight-light px-1">{{$aroom_2->name}}</th>
                </tr>
                </thead>


                <tbody>
                <tr class="col text-center">
                    <th scope="row">1</th>
                    {{--<td>--}}
                    {{--{{$img_room1->pathimg}}--}}
                    {{--</td>--}}
                    <td>
                        <div class=" card-img">
                            <img src="{{asset('/images_rooms/'.$img_room1['imageRoom']->pathimg)}}" class="w-50"
                                 alt="">
                        </div>
                    </td>
                    <td>
                        <div class=" card-img">
                            <img src="{{asset('/images_rooms/'.$img_room2['imageRoom']->pathimg)}}" class="w-50"
                                 alt="">
                        </div>
                    </td>

                </tr>
                <tr class="col text-center">
                    <td>
                        ขนาด
                    </td>
                    <td>

                        {{$aroom_1->size}} ตรม.
                    </td>
                    <td>
                        {{$aroom_2->size}} ตรม.

                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        ราคา/เดือน
                    </td>
                    <td>
                        {{number_format($aroom_1->price)}} บาท
                    </td>
                    <td>
                        {{number_format( $aroom_2->price)}} บาท

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
                <tr class="text-center">
                    <td>
                        จุดเด่นของห้อง
                    </td>
                    <td>
                        @if($aroom_1->hilight =="")
                            ไม่มีข้อมูล
                        @else
                            {{$aroom_1->hilight}}
                        @endif

                    </td>
                    <td>
                        @if($aroom_2->hilight =="")
                            ไม่มีข้อมูล

                        @else
                            {{$aroom_2->hilight}}
                        @endif

                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        สิ่งอำนวยความสะดวก
                    </td>
                    <td>
                        <div class="col-12 row">
                            @foreach($facilityOfroom_1 as $f_room1_a)
                                <div class="col">
                                    <img class=" h-auto" style="width: 30px"
                                         src="{{asset('/icon/'.$f_room1_a->pathImage.".svg")}}"
                                         alt="">
                                    <p class="font-weight-light" style="font-size: 12px">{{$f_room1_a->name}}</p>
                                </div>
                            @endforeach

                        </div>
                    </td>

                    <td>

                        <div class="col-12 row">
                            @foreach($facilityOfroom_2 as $f_room2_a)
                                <div class="col">
                                    <img class=" h-auto" style="width: 30px"
                                         src="{{asset('/icon/'.$f_room2_a->pathImage.".svg")}}"
                                         alt="">
                                    <p class="font-weight-light" style="font-size: 12px">{{$f_room2_a->name}}</p>
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
                        <p>{{$img_room1->lease}} เดือน</p>
                    </td>

                    <td class="text-center">
                        <p>{{$img_room2->lease}} เดือน</p>
                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        ติดต่อเจ้าของ
                    </td>

                    <td class="d-flex justify-content-center">
                        @if($img_room1->line_qrcode == null)

                        @else
                            <a href="{{$img_room1->line_qrcode}}" class="btn col-4" role="button"
                               aria-disabled="true"
                            >
                                <img src="{{asset('icon/line-icon.png')}}"
                                     class="w-25 h-auto" alt="">
                            </a>

                        @endif

                        @if($img_room1->url_facebook == null)

                        @else
                            <a href="{{$img_room1->url_facebook}}" class="btn col-4" role="button"
                               aria-disabled="true"
                            >
                                <img src="{{asset('icon/facebook_circle-512.png')}}"
                                     class="w-25 h-auto"
                                     alt="phone">

                            </a>

                        @endif

                        @if($img_room1->telephone == null)

                        @else
                            <a href="tel:{{$img_room1->telephone}}" target="_blank" class="btn col-4" role="button"
                               aria-disabled="true"
                            >
                                <img src="{{asset('icon/phon_icon.png')}}" alt="" class="w-25 h-auto">

                            </a>
                        @endif


                    </td>

                    <td class="text-center">
                        @if($img_room2->line_qrcode == null)

                        @else
                            <a href="{{$img_room2->line_qrcode}}" class="btn col-4" role="button"
                               aria-disabled="true"
                            >
                                <img src="{{asset('icon/line-icon.png')}}"
                                     class="w-25 h-auto" alt="">
                            </a>

                        @endif

                        @if($img_room2->url_facebook == null)

                        @else
                            <a href="{{$img_room2->url_facebook}}" class="btn col-4" role="button"
                               aria-disabled="true"
                            >
                                <img src="{{asset('icon/facebook_circle-512.png')}}"
                                     class="w-25 h-auto"
                                     alt="phone">

                            </a>

                        @endif

                        @if($img_room2->telephone == null)

                        @else
                            <a href="tel:{{$img_room2->telephone}}" target="_blank" class="btn col-4" role="button"
                               aria-disabled="true"
                            >
                                <img src="{{asset('icon/phon_icon.png')}}" alt="" class="w-25 h-auto">

                            </a>
                        @endif

                    </td>

                </tr>



                </tbody>
            </table>

        </div>
    </div>
@endsection


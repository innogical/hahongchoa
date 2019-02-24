@section('cardzone')
    @if(count($result)>0)
        @foreach($result as $room)
            <div class="col-md-4 col-4 card  mt-2 border-0" style="height:auto;">
                <div class="">
                    <div class="card-img bg-dark" style="height:auto; width: 100%">
                        <img src="{{asset('/images_rooms/'.$room->imgRoomF)}}" alt="{{$room->imgRoomF}}" width="100%"
                             height="auto">
                    </div>

                </div>
                <a href="/room/{{$room->id}}">

                    <div class="card-body border pb-1 hover_item_room">
                        <div class="row">
                            <p class="color-dark-blue-fond col p-0 m-0" style="font-size: 20px">{{$room->name}}</p>
                        </div>
                        <div class="row">
                            <p style="font-size: 12px; " class="text-dark">{{$room->address}}</p>
                        </div>
                        <div class="box-twin-data row">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/trian.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond">
                                <p class="font-weight-light">
                                    สถานีรถไฟฟ้า{{$room->name_station}}
                                </p>
                            </div>
                        </div>

                        {{--<div class="box-twin-data row ">--}}
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                        {{--<img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        {{--<div class="text-justify col color-dark-orange-fond">--}}
                        {{--{{$room->hilight}}--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="box-twin-data row ">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond font-weight-light">1-{{$room->personLive}} คน</div>
                        </div>
                        <div class="box-twin-data row">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/pin.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond font-weight-light">{{number_format($room->distance,1,'.','')}}
                                กิโลเมตร
                            </div>
                        </div>

                        <div class=" row ">
                            {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">--}}
                            {{--</div>--}}
                            <div class="col-12">
                                <div class="text-right color-dark-blue-fond"
                                     style="font-size: 18px">{{number_format($room->price)}}฿.- /เดือน
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="col btn  mt-2 btn_green text-white">ติดต่อเจ้าของ
                            </button>
                        </div>
                    </div>
                </a>

            </div>
        @endforeach
    @else

        <script>
            $(document).ready(function () {
                $("#myModal").modal();


            })
        </script>

    @endif
@endsection

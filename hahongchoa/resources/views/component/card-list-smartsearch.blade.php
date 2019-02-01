@section('cardzone')
    @if(count($result)>0)
        {{--{{count($result)}}--}}
        @foreach($result as $room)
            <div class="col-3 card  mt-2 border-0" style="height:auto;">
                <div class="">
                    <div class="card-img bg-dark" style="height:164px; width: 100%">
                        <img class="setad position-absolute" src="{{asset('/icon/comp_ad.png')}}" alt="Ad">
                        <button type="submit" class=" btn btn_green btn-compare position-absolute">เปรียบเทียบ</button>

                        <img src="{{asset('/images_rooms/'.$room->imgRoomF)}}" alt="{{$room->imgRoomF}}" width="100%"
                             height="164px">

                    </div>

                </div>
                <a href="/room/{{$room->id}}">

                    <div class="card-body border pb-1 hover_item_room">
                        <div class="row">
                            <p class="color-green col p-0 m-0 color-dark-blue-fond">{{$room->name}}</p>
                        </div>
                        <div class="box-twin-data row mt-2">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/pin.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond">
                                สถานีรถไฟฟ้า{{$room->name_station}}
                            </div>
                        </div>

                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-orange-fond">
                                {{$room->hilight}}
                            </div>
                        </div>

                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond">{{$room->personLive}} คน</div>
                        </div>

                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond">{{$room->price}} บาท/เดือน</div>
                        </div>
                        <div class="box-twin-data row mt-1">
                            @if($optioncar =="havecar")
                                <div class="img-fluid col-1 p-0 mr-1">
                                    <img src="{{asset('/icon/distance.svg')}}" alt="" width="30px" height="30px">
                                </div>
                            @else
                                <div class="img-fluid col-1 p-0 mr-1">
                                    <img src="{{asset('/icon/skytrian.svg')}}" alt="" width="30px" height="30px">
                                </div>
                            @endif
                            <div class="text-justify col color-dark-blue-fond">{{number_format($room->distance,1,'.','')}}
                                กิโลเมตร
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="col btn btn-light-blue mt-2 color-dark-orange-fond">
                                ติดต่อเจ้าของ
                            </button>
                        </div>
                    </div>
                </a>

            </div>
        @endforeach
    @else

        <script>
            $(document).ready(function () {
                $("#myModal").modal()
            })
        </script>

    @endif
@endsection

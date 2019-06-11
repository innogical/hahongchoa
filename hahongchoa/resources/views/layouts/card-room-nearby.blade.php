@section('nearroom')
    @foreach($mapdataNearby as $room)

        <div class="col-md-4 col-12 card  mt-2 border-0" style="height:auto;">
            <div class="">
                <div class="card-img bg-dark" style="height:164px; width: 100%">
                    {{--<img class="setad position-absolute" src="{{asset('/icon/comp_ad.png')}}" alt="Ad" >--}}
                    {{--<button type="submit" class=" btn btn_green btn-compare position-absolute">เปรียบเทียบ</button>--}}

                    <img src="{{asset('/images_rooms/'.$room->pathimg)}}" alt="{{$room->pathimg}}" width="100%"
                         height="164px">

                </div>

            </div>
            <a href="/room/{{$room->id}}">

                <div class="card-body border pb-1 hover_item_room">
                    <div class="row">
                        <p class="color-green col p-0 m-0 color-dark-blue-fond">{{$room->name}}</p>
                    </div>
                    <div class="row">
                        <p style="font-size: 12px; " class="text-dark">{{$room->address}}</p>
                    </div>
                    <div class="box-twin-data row mt-2">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/pin.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">
                            ย่าน{{$room->zonename}}
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
                        <div class="text-justify col color-dark-blue-fond">{{$room->personLive}}</div>
                    </div>

                    <div class=" row mt-1">
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        <div class="col-12">
                            <div class="text-right color-dark-blue-fond" style="font-size: 18px">{{$room->price}}.-</div>

                        </div>
                    </div>
                    {{--<div class="box-twin-data row mt-1">--}}
                    {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                    {{--<img src="{{asset('/icon/distance.svg')}}" alt="" width="30px" height="30px">--}}
                    {{--</div>--}}
                    {{--<div class="text-justify col color-dark-blue-fond">{{}} กิโลเมตร</div>--}}
                    {{--</div>--}}
                    <div class="row">
                        <button type="submit" class="col btn  mt-2 btn_green text-white">ติดต่อเจ้าของ
                        </button>
                    </div>
                </div>
            </a>

        </div>
    @endforeach
@endsection



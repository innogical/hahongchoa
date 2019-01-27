@section('myroom')
    @foreach($myrooms as $myroom)
        <div class="col-3 card  mt-2 border-0" style="height:auto;">
            <div class="">
                <div class="card-img bg-dark" style="height:164px; width: 100%">
                    {{--<img class="setad position-absolute" src="{{asset('/icon/comp_ad.png')}}" alt="Ad">--}}
                    {{--<button type="submit" class=" btn btn_green btn-compare position-absolute">เปรียบเทียบ</button>--}}

                    <img src="{{asset('/images_rooms/'.$myroom->pathimg)}}" alt="{{$myroom->pathimg}}" width="100%"
                         height="164px">
                    {{--<img src="{{asset('/images/')}}" alt="{{$room->pathimg}}">--}}

                </div>

            </div>
            <a href="/room/{{$myroom->roomid}}">

                <div class="card-body border pb-1 hover_item_room">
                    <div class="row">
                        <p class="color-green col p-0 m-0 color-dark-blue-fond">{{$myroom->name}}</p>
                    </div>
                    <div class="box-twin-data row mt-2">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/pin.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">
                            ย่าน{{$myroom->name_station}}
                        </div>
                    </div>

                    <div class="box-twin-data row mt-1">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-orange-fond">
                            {{$myroom->hilight}}
                        </div>
                    </div>

                    <div class="box-twin-data row mt-1">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">{{$myroom->personLive}}</div>
                    </div>

                    <div class="box-twin-data row mt-1">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">{{$myroom->price}} บาท/เดือน</div>
                    </div>

                    <div class="row justify-content-center">
                        <a href="/room/{{$myroom->roomid}}/edit" class="col-4">

                            <button type="submit" class=" btn btn_green m-1 text-white">แก้ไข
                            </button>
                        </a>

                        <a href="/room/{{$myroom->roomid}}" class="col-4">
                            <button type="submit" class=" btn btn-orange-light m-1 color-dark-orange-fond">ลบ
                            </button>
                        </a>


                    </div>
                </div>
            </a>

        </div>
    @endforeach
@endsection
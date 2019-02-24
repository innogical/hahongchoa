@section('myroom')
    @foreach($myrooms as $myroom)
        <div class="col-4 card mt-2 border-0" style="height:auto;">
            <div class="card-img bg-dark" style="height:auto; width: 100%">
                <img src="{{asset('/images_rooms/'.$myroom->pathimg)}}" alt="{{$myroom->pathimg}}" width="100%"
                     height="auto">
            </div>
            <a href="/room/{{$myroom->roomid}}">

                <div class="card-body border pb-1 hover_item_room">
                    <div class="row">
                        <p class=" col p-0 m-0 color-dark-blue-fond" style="font-size:18px;">{{$myroom->name}}</p>
                    </div>
                    <div class="row">
                        <p class="font-weight-light col p-0 m-0 color-dark-blue-fond"
                           style="font-size: 14px">{{$myroom->address}}</p>
                    </div>
                    <div class="box-twin-data row mt-2">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/trian.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">
                            ใกล้สถานีรถไฟฟ้า{{$myroom->name_station}}
                        </div>
                    </div>
                    <div class="box-twin-data row mt-1">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">{{$myroom->personLive}}</div>
                    </div>
                    <div class=" row mt-1">
                        <div class="col-12">
                            <div class="text-right color-dark-blue-fond"
                                 style="font-size: 18px">{{number_format($myroom->price)}}
                                ฿.-/เดือน
                            </div>

                        </div>
                    </div>

                    <div class="row d-flex justify-content-between m-2">
                        {{--<a href="/room/{{$myroom->roomid}}" class="btn bg_corner btn_green">แก้ไข</a>--}}
                        <button class="btn font-weight-light btn_green bg_corner col-md-5">แก้ไข</button>
                        <button class="btn text-black-50 font-weight-light border bg_corner col-md-5">ลบ</button>
                        {{--<a href="/room/{{$myroom->roomid}}/edit"--}}
                        {{--class="btn font-weight-light btn_green bg_corner col-md-4">--}}
                        {{--แก้ไข--}}
                        {{--</a>--}}

                        {{--<a href="/room/{{$myroom->roomid}}"--}}
                        {{--class="btn text-black-50 font-weight-light border bg_corner col-md-4">ลบ--}}
                        {{--</a>--}}


                    </div>
                </div>
            </a>

        </div>
    @endforeach
@endsection
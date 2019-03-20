@section('myroom')
    @foreach($myrooms as $myroom)
        <div class="col-md-4 col-12 mt-2 border-0" style="height:auto;">
            <div class="card-img bg-dark" style="height:auto; width: 100%">
                <img src="{{asset('/images_rooms/'.$myroom->pathimg)}}" alt="{{$myroom->pathimg}}" width="100%"
                     height="230px">
            </div>
            {{--<a href="/room/{{$myroom->roomid}}">--}}

            <div class="card-body border pb-1 pt-0 ">
                <div class="row">
                    <p class=" col p-0 m-0 color-dark-blue-fond" style="font-size:18px;">{{$myroom->name}}</p>
                </div>
                <div class="row">
                    <p class="font-weight-light col p-0 m-0 text-black-50"
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

                <div class="box-twin-data row mt-2">
                    <div class="img-fluid col-1 p-0 mr-1">
                        <img src="{{asset('/icon/view.png')}}" alt="" width="30px" height="30px">
                    </div>
                    <div class="text-justify col color-dark-blue-fond">
                        มีคนเข้าดูห้องของคุณ 0 ครั้ง
                    </div>
                </div>
                <div class="box-twin-data row mt-1">
                    <div class="img-fluid col-1 p-0 mr-1">
                        <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                    </div>
                    <div class="text-justify col color-dark-blue-fond">{{$myroom->personLive}} คน</div>
                </div>
                <div class=" row mt-1">
                    <div class="col-12">
                        <div class="text-right color-dark-blue-fond"
                             style="font-size: 18px">{{number_format($myroom->price)}}
                            ฿.-/เดือน
                        </div>

                    </div>
                </div>

                <div class="row d-flex justify-content-between">
                    <a href="/managerroom/{{$myroom->roomid}}/edit"
                       class="btn bg_corner col-md-5 col-5 m-1 btn_green text-white">แก้ไข</a>

                    <a onclick="clcikeskit({{$myroom->roomid}})"
                       class="btn bg_corner col-md-5  col-5 m-1 border-dark text-black-50">ลบ</a>

                    <form action="/managerroom/{{$myroom->roomid}}" method="post" hidden>
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="btn_dele{{$myroom->roomid}}"
                                class="btn bg_corner col-md-5  col-5 m-1 border-dark text-black-50">ลบ
                        </button>
                    </form>
                    {{--<button class="btn font-weight-light btn_green bg_corner col-md-5">แก้ไข</button>--}}
                    {{--<button class="btn text-black-50 font-weight-light border bg_corner col-md-5">ลบ</button>--}}


                </div>
            </div>
            {{--</a>--}}

        </div>
    @endforeach
@endsection
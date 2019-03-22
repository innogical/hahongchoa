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

                    <a class="btn bg_corner col-md-5  col-5 m-1 border-dark text-black-50" data-toggle="modal"
                       data-target="#exampleModal{{$myroom->roomid}}">ลบ</a>


                    {{--<button class="btn font-weight-light btn_green bg_corner col-md-5">แก้ไข</button>--}}
                    {{--<button class="btn text-black-50 font-weight-light border bg_corner col-md-5">ลบ</button>--}}


                </div>
            </div>
            {{--</a>--}}

        </div>

        <div class=" modal fade" id="exampleModal{{$myroom->roomid}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ต้องการจะลบห้องนี้หรือไม่</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">


                        <form action="/managerroom/{{$myroom->roomid}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="btn_dele{{$myroom->roomid}}"
                                    class="btn bg_corner border-danger col-md-5 col-6 m-1 text-danger"
                                    data-toggle="modal"
                                    data-target="#exampleModal{{$myroom->roomid}}"
                                    style="background-color: transparent">
                                ลบ
                            </button>

                            <button type="button" class="btn text-black-50 btn-secondary col-md-5 col-6 bg_corner border-dark"
                                    style="background-color: transparent" data-dismiss="modal">ยกเลิก
                            </button>


                        </form>


                    </div>

                </div>
            </div>
        </div>



    @endforeach
@endsection
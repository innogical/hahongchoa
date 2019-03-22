@section('room')
    @foreach($newRoom as $key => $room)

        <div class="col-md-4 col-12 card  mt-4 border-0" style="height:auto;">
            <div class="hover_item_room" id="select_com{{$room->roomid}}">

                <div class="card-img bg-dark" style="height:auto; width: 100%">
                    <div class="row">
                        <label class="mb-0">
                            <input type="checkbox" name="chsx_compare_room" hidden>

                            {{--<div class="hover_compare_room" id="btn_compare{{$room->roomid}}"--}}
                            {{--onclick="compareRoom({{$room->roomid}})">--}}
                            {{--<img class="setad position-absolute justify-content-end "--}}
                            {{--src="{{asset('/icon/compare.svg')}}" alt="Ad">--}}
                            {{--</div>--}}
                        </label>

                    </div>


                    <button type="submit"
                            class="btn text-center text-white-50 font-weight-light color-dark-orange-fond   btn-compare position-absolute"
                            style="background-color: #1E4159;"
                            id="btn_compare{{$room->roomid}}"
                            onclick="compareRoom({{$room->roomid}})">เปรียบเทียบ
                    </button>

                    <img src="{{asset('/images_rooms/'.$room->pathimg)}}" alt="{{$room->pathimg}}"
                         class="img-fluid"
                         style="width: 100%; height: 220px">

                </div>


                <div class="card-body border pb-1 pt-0 ">
                    <a href="/room/{{$room->id}}">

                        <div class="row">
                            <p class=" col p-0 m-0  color-dark-blue-fond threedotother_text ">{{$room->name}}</p>
                        </div>
                        <div class="row">
                            <p style="font-size: 12px; " class="text-dark m-0 threedotother_text">{{$room->address}}</p>
                        </div>
                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/trian.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond font-weight-light text-black-50">
                                ใกล้สถานีรถไฟฟ้า{{$room->zonename}}
                            </div>
                        </div>

                        {{--<div class="box-twin-data row mt-1">--}}
                            {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                                {{--<img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">--}}
                            {{--</div>--}}
                            {{--<div class="text-justify col color-dark-orange-fond font-weight-light">--}}
                                {{--{{$room->hilight}}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond font-weight-light text-black-50">{{$room->personLive}}คน</div>
                        </div>

                        <div class=" row mt-1">
                            {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">--}}
                            {{--</div>--}}
                            <div class="col-12">
                                <div class="text-right color-dark-blue-fond text-black"
                                     style="font-size: 18px">{{number_format($room->price)}}
                                    ฿.-/เดือน
                                </div>

                            </div>
                        </div>
                        {{--<div class="box-twin-data row mt-1">--}}
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                        {{--<img src="{{asset('/icon/distance.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        {{--<div class="text-justify col color-dark-blue-fond">{{}} กิโลเมตร</div>--}}
                        {{--</div>--}}
                    </a>

                    <div class="col-md-12">
                        {{--<button type="submit"--}}
                        {{--class="btn col-md-12 btn_green text-white font-weight-light m-2 bg_corner"--}}
                        {{--onclick="contact_room({{$room->id}})">--}}
                        {{--ติดต่อเจ้าของ--}}
                        {{--</button>--}}
                        {{--<button type="submit"--}}
                        {{--class="btn col-md-12 btn_green text-white font-weight-light m-2 bg_corner"--}}
                        {{--data-toggle="modal" data-target="#myModal"--}}
                        {{-->--}}
                        {{--ติดต่อเจ้าของ--}}
                        {{--</button>--}}
                        <button type="button" class="btn col-md-12 btn_green text-white font-weight-light m-2 bg_corner"
                                data-toggle="modal"
                                data-target="#exampleModal{{$room->id}}">
                            ติดต่อเจ้าของ
                        </button>

                    </div>


                </div>

            </div>
        </div>

        <input type="text" name="compareRoom[]" id="compareRoom" hidden>


        <div class="modal fade" id="exampleModal{{$room->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ช่องทางการติดต่อ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        {{--<div class="row m-2">--}}
                        <div class="row">

                            @if($room->url_facebook == ""|| $room->url_facebook == null)
                            @else
                                <div class="col-auto">
                                    <a href="{{$room->url_facebook}}" class="btn text-white "
                                       style="background-color: #3c5a99">Facebook</a>
                                </div>
                            @endif
                            {{--</div>--}}
                            {{--<div class="row m-2">--}}
                            @if($room->line_qrcode == "" || $room->line_qrcode == null)
                            @else
                                <div class="col-auto">
                                    <a href="{{$room->line_qrcode}}" class="btn text-white"
                                       style="background-color: #00c300">Line</a>
                                </div>

                            @endif
                            {{--</div>--}}
                            {{--<div class="row m-2">--}}
                            @if($room->telephone == "" ||$room->telephone == null)
                            @else
                                <div class="col-auto">
                                    <a href="{{$room->telephone}}"
                                       class="btn text-white  btn-orange-light">Telephone</a>
                                </div>
                            @endif
                            {{--</div>--}}
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    </div>
                </div>
            </div>
        </div>


    @endforeach
    <script src="{{asset('/js/sortoption.js')}}"></script>


@endsection


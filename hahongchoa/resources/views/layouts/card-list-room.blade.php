@section('room')
    @foreach($newRoom as $room)

        <div class="col-md-4 col-12 card  mt-4 border-0 " style="height:auto;">
            <div class="hover_item_room">

                <div class="">
                    <div class="card-img bg-dark" style="height:auto; width: 100%">

                        <div class="row">
                            <div class="hover_compare_room" onclick="compareRoom({{$room->id}})">

                                <img class="setad position-absolute justify-content-end "

                                     src="{{asset('/icon/compare.svg')}}" alt="Ad">
                            </div>
                        </div>
                        {{--<button type="submit" class=" btn btn_green btn-compare position-absolute">เปรียบเทียบ</button>--}}

                        <img src="{{asset('/images_rooms/'.$room->pathimg)}}" alt="{{$room->pathimg}}" width="100%"
                             height="auto">

                    </div>

                </div>


                <a href="/room/{{$room->id}}">

                    <div class="card-body border pb-1 pt-0 ">
                        <div class="row">
                            <p class=" col p-0 m-0 color-dark-blue-fond threedotother_text">{{$room->name}}</p>
                        </div>
                        <div class="row">
                            <p style="font-size: 12px; " class="text-dark m-0 threedotother_text">{{$room->address}}</p>
                        </div>
                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/trian.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond font-weight-light" >
                                ใกล้สถานีรถไฟฟ้า{{$room->zonename}}
                            </div>
                        </div>

                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-orange-fond font-weight-light">
                                {{$room->hilight}}
                            </div>
                        </div>

                        <div class="box-twin-data row mt-1">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond font-weight-light">{{$room->personLive}}</div>
                        </div>

                        <div class=" row mt-1">
                            {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">--}}
                            {{--</div>--}}
                            <div class="col-12">
                                <div class="text-right color-dark-blue-fond" style="font-size: 18px">{{$room->price}}
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
                        <div class="col-md-12">
                            <button type="submit" class="btn col-md-12 btn_green text-white font-weight-light m-2 bg_corner">ติดต่อเจ้าของ
                            </button>
                        </div>


                    </div>
                </a>

            </div>
        </div>

        <input type="text" name="compareRoom[]" id="compareRoom" hidden>


    @endforeach
    <script src="{{asset('/js/sortoption.js')}}"></script>
@endsection


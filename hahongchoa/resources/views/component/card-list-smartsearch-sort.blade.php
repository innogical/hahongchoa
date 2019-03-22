@section('cardzone')
    @if(count($result)>0)
        @foreach($result as $room)
            <div class="col-md-4 col-4 card  mt-2 border-0 p-0  " style="height:auto;">
                <div class="">
                    <div class="card-img bg-dark" style="height:270px; width: 100%">
                        <img src="{{asset('/images_rooms/'.$room->imgRoomF)}}" alt="{{$room->imgRoomF}}" width="100%"
                             height="auto">
                    </div>
                </div>

                <a href="/room/{{$room->id}}">

                    <div class="card-body border pb-1 hover_item_room">
                        <div class="row">
                            <p class="color-green col p-0 m-0 color-dark-blue-fond threedotother_text">{{$room->name}}</p>
                        </div>
                        <div class="row">
                            <p style="font-size: 12px; " class="text-dark">{{$room->address}}</p>
                        </div>
                        <div class="box-twin-data row">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/trian.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond">
                                <p class="threedotother_text">
                                    สถานีรถไฟฟ้า{{$room->name_station}}
                                </p>
                            </div>
                        </div>

                        <div class="box-twin-data row ">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-orange-fond">
                                {{$room->hilight}}
                            </div>
                        </div>

                        <div class="box-twin-data row ">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond">{{$room->personLive}}</div>
                        </div>
                        <div class="box-twin-data row">
                            <div class="img-fluid col-1 p-0 mr-1">
                                <img src="{{asset('/icon/pin.svg')}}" alt="" width="30px" height="30px">
                            </div>
                            <div class="text-justify col color-dark-blue-fond">{{number_format($room->distance,1,'.','')}}
                                กิโลเมตร
                            </div>
                        </div>

                        <div class=" row ">
                            {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">--}}
                            {{--</div>--}}
                            <div class="col-12">
                                <div class="text-right color-dark-blue-fond"
                                     style="font-size: 18px">{{number_format($room->price)}}.-
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

                        <div class="row">
                            <button type="button" class="btn col-md-12 btn_green text-white font-weight-light m-2 bg_corner"
                                    data-toggle="modal"
                                    data-target="#exampleModal{{$room->id}}">
                                ติดต่อเจ้าของ
                            </button>
                        </div>
                    </div>

            {{--</div>--}}
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

                                @if($room->url_facebook == "")
                                @else
                                    <div class="col-auto">
                                        <a href="{{$room->url_facebook}}" class="btn text-white "
                                           style="background-color: #3c5a99">Facebook</a>
                                    </div>
                                @endif
                                {{--</div>--}}
                                {{--<div class="row m-2">--}}
                                @if($room->line_qrcode == "")
                                @else
                                    <div class="col-auto">
                                        <a href="{{$room->line_qrcode}}" class="btn text-white"
                                           style="background-color: #00c300">Line</a>
                                    </div>

                                @endif
                                {{--</div>--}}
                                {{--<div class="row m-2">--}}
                                @if($room->telephone == "")
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
    @else

        <script>
            $(document).ready(function () {
                $("#myModal").modal();


            })
        </script>

    @endif
@endsection

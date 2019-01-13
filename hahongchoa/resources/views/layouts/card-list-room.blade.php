@section('room')
    @foreach($listrooms as $room)
        {{--<div class="col-3 card  mt-2 border-0" style="height:auto;">--}}
            {{--<div class="">--}}
                {{--<div class="card-img bg-dark" style="height:164px; width: 100%">--}}
                    {{--<img class="setad" src="{{asset('/icon/comp_ad.png')}}" alt="Ad">--}}
                    {{--<button type="submit" class=" btn btn_green btn-compare">เปรียบเทียบ</button>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<a href="/room/{{$room->id}}">--}}

                {{--<div class="card-body border pb-1 hover_item_room">--}}
                    {{--<div class="row">--}}
                        {{--<p class="color-green col p-0 m-0 color-dark-blue-fond">{{$room->name}}</p>--}}
                    {{--</div>--}}
                    {{--<div class="box-twin-data row mt-2">--}}
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/pin.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        {{--<div class="text-justify col color-dark-blue-fond">ห้างสรรพสินค้า</div>--}}
                    {{--</div>--}}

                    {{--<div class="box-twin-data row mt-1">--}}
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/hilight.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        {{--<div class="text-justify col color-dark-orange-fond">--}}
                            {{--ทำเลตั้งอยู่ด้านหลัง Gateway--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="box-twin-data row mt-1">--}}
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/person.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        {{--<div class="text-justify col color-dark-blue-fond">1-2คน</div>--}}
                    {{--</div>--}}

                    {{--<div class="box-twin-data row mt-1">--}}
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        {{--<div class="text-justify col color-dark-blue-fond">5000 บาท</div>--}}
                    {{--</div>--}}
                    {{--<div class="box-twin-data row mt-1">--}}
                        {{--<div class="img-fluid col-1 p-0 mr-1">--}}
                            {{--<img src="{{asset('/icon/distance.svg')}}" alt="" width="30px" height="30px">--}}
                        {{--</div>--}}
                        {{--<div class="text-justify col color-dark-blue-fond">0.7 m</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<button type="submit" class="col btn btn-light-blue mt-2 color-dark-orange-fond">ติดต่อเจ้าของ--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</a>--}}

        {{--</div>--}}

        <div class="col-3 card  mt-2 border-0" style="height:auto;">
            <div class="">
                <div class="card-img bg-dark" style="height:164px; width: 100%">
                    <img class="setad position-absolute" src="{{asset('/icon/comp_ad.png')}}" alt="Ad" >
                    <button type="submit" class=" btn btn_green btn-compare position-absolute">เปรียบเทียบ</button>

                    <img src="{{asset('/images/'.$room->pathimg)}}" alt="{{$room->pathimg}}" width="100%" height="164px">
                    {{--<img src="{{asset('/images/')}}" alt="{{$room->pathimg}}">--}}

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

                    <div class="box-twin-data row mt-1">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/baht.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">{{$room->price}} บาท</div>
                    </div>
                    <div class="box-twin-data row mt-1">
                        <div class="img-fluid col-1 p-0 mr-1">
                            <img src="{{asset('/icon/distance.svg')}}" alt="" width="30px" height="30px">
                        </div>
                        <div class="text-justify col color-dark-blue-fond">{{}} กิโลเมตร</div>
                    </div>
                    <div class="row">
                        <button type="submit" class="col btn btn-light-blue mt-2 color-dark-orange-fond">ติดต่อเจ้าของ
                        </button>
                    </div>
                </div>
            </a>

        </div>
    @endforeach
@endsection
@section('search')
    <div class="row">
        <div class="col box-search">
            {{--<img src="{{asset('img_view/background-search.png')}}">--}}
            <div class="align-middle">

                <div class="col-4 offset-1">
                    <div class="form-group bg-white body_box-search p-2">
                        <form action="/search" method="post" class="p-2">
                            @csrf
                            <div class="text-center">
                                <h5>ค้นหาห้องที่ใช่สำหรับคุณ</h5>
                            </div>
                            <div class="row p-2">
                                <input type="text" name="price_low" class="col-6" placeholder="ราคาตํ่าสุด">
                                <input type="text" name="price_high" class="col-6" placeholder="ราคาแพงสุด">



                                <select class="col-6 mt-2" name="person_live">
                                    <option selected>1</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                    <option value="3">5</option>
                                </select>

                                <select class="col-6 mt-2" name="area_zone">
                                    <option selected>พื้นที่</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>


                                <input class="col-12 mt-2" type="text" placeholder="สถานที่ทำงาน / มหาวิทยาลัย"
                                       name="lifestyleplace"
                                >


                                <div class="col-2 mt-2 form-group text-center ml-4">
                                    <label class="btn border" id="radio_car0">
                                        <img src="{{asset('/icon/nocar.svg' )}}" alt="">
                                        <input type="radio" value="nothavecar"
                                               name="optioncar" class="invisible" onclick="optionCar()">
                                    </label>
                                </div>

                                <div class="col-2 mt-2 form-group text-center m-0">
                                    <label class="btn border" id="radio_car1">
                                        <img src="{{asset('/icon/havecar.svg' )}}" alt="">
                                        <input type="radio" value="havecar"
                                               name="optioncar" class="invisible" onclick="optionCar()">
                                    </label>
                                </div>
                                <input type="text" name="mylocation_lat" id="mylocation_lat" value="" hidden>
                                <input type="text" name="mylocation_lng" id="mylocation_lng" value="" hidden>


                                <div class="col-6 mt-2 form-group pl-2 pr-2 ">
                                    <button type="submit" class=" btn btn-default color color-higiht-orange-btn"
                                            style="width: 100%">ค้นหา
                                    </button>

                                    {{--</div>--}}
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('orderfilter')
    <div class="col-12 m-2">
        <div class="row">
            <div class="offset-7"></div>
            <div class="col-2 form-group pl-2 pr-2">
                <select name="start_val" id="area_zone" style="width: 100%">
                    <option selected>พื้นที่</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <h6 class="col-1 p-0 text-center">เรียงราคา</h6>
            <div class="col-2 form-group pl-2 pr-0">
                <select name="start_val" id="area_zone" style="width: 100%">
                    <option value="1">ถูกถึงแพง</option>
                    <option value="2">แพงถึงถูก</option>
                </select>
            </div>
        </div>

    </div>


@endsection
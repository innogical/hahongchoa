@section('search')
    <div class="row">
        <div class="col box-search h-236">
            {{--<img src="{{asset('img_view/background-search.png')}}">--}}
            <div class="align-middle">

                <div class="col-4">
                    <div class="header-box-search bg-white text-center">
                        <h5>ค้นหาห้องที่ใช่สำหรับคุณ</h5>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group bg-white body_box-search">
                        <form class="row" action="/">
                            <div class="offset-1"></div>
                            <div class="col-2 form-group pl-2 pr-2">
                                <label for="start">เริ่ม</label>
                                <select name="start_val" id="start_val" style="width: 78%">
                                    <option selected>1</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-2 form-group pl-2 pr-2">
                                <label for="start">ถึง</label>
                                <select name="start_val" id="start_val" style="width: 78%">
                                    <option selected>1</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-3 form-group pl-2 pr-2">
                                <label for="start">ผู้อยู่อาศัย</label>
                                <select name="start_val" id="person_live" style="width: 66%">
                                    <option selected>1</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-3 form-group pl-2 pr-2">
                                <select name="start_val" id="area_zone" style="width: 100%">
                                    <option selected>พื้นที่</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="offset-1"></div>
                            <div class="offset-1"></div>
                            <div class="col-1 form-group pl-2 pr-2">
                                <img src="" alt="ไม่มีรถ">
                            </div>
                            <div class="col-1 form-group pl-2 pr-2">
                                <img src="" alt="มีรถ">
                            </div>
                            <div class="col-6 pl-2 pr-2 form-group">
                                <input type="text" placeholder="สถานที่ทำงาน / มหาวิทยาลัย" name="lifestyle"
                                       style="width: 100%">
                            </div>
                            <div class="form-group col-2 pl-2 pr-2 ">
                                <button type="submit" class=" btn btn-default color color-higiht-orange-btn"
                                        style="width: 100%">Submit
                                </button>

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
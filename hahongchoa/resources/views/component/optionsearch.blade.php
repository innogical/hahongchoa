@section('optionbarsearch')

    <div class=" bg_corner p-1 btn col-2 shadow_box show_desktop" id="btn_filter">
        <div class="row col-12 d-flex justify-content-center">
            <img src="{{asset('icon/filter.svg')}}" class="w-25 h-25"/>
            <p class="font-weight-light">คัดกรอง</p>
        </div>
    </div>

    <div class="show_mobile bg_corner p-1 btn  shadow_box" id="btn_filter">
        <img src="{{asset('icon/filter.svg')}}" class="w-100 h-100"/>
    </div>

@endsection
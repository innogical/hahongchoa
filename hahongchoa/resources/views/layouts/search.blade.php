@section('search')
    <div class="embed-responsive embed-responsive-16by9 vdo_desktop">
        <video width="100%" height="100%" loop autoplay>
            <source src="vdo/screen_backdrop.mp4" type="video/mp4">
        </video>
    </div>

    <div class="img_fordevice">
        <img src="{{asset('img_view/image_respon.png')}}" class="w-100 h-auto" alt="image">
    </div>
    <div class="col-12 col-md-6 custom_box_search ">
        <form action="/roomnearskytrian" method="post" class=" bg-white body_box-search">
            @csrf
            <div class="col-md-auto col-auto position-relative mt-2 show_mobile" style="top:8px">
                <h5 class="text-center justify-content-center">
                    ค้นหา
                </h5>
            </div>
            <div class="row">
                <div class="col-md-12 col-12 mt-3 mt-md-0">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <div class="d-flex  justify-content-center">
                            <li class="nav-item col-auto  col-md-auto text-center pr-0">
                                <a class="nav-link active bg-active_tab_search text-black-50"
                                   id="search-tab-nearlocation"
                                   data-toggle="tab"
                                   href="#home" role="tab"
                                   aria-controls="home" onclick="clickeoptionSearch(1)"
                                   aria-selected="true">ใกล้ออฟฟิศ/มหาวิทยาลัย</a>
                            </li>
                            <li class="nav-item col-auto col-md-6  text-center pl-0">
                                <a class="nav-link text-black-50" id="search-tab-near_station" data-toggle="tab"
                                   href="#profile"
                                   role="tab"
                                   aria-controls="profile" aria-selected="false" onclick="clickeoptionSearch(2)">ใกล้สถานีรถไฟฟ้า</a>
                            </li>
                        </div>

                    </ul>
                </div>
            </div>

            <div class="tab-content " id="myTabContent">
            </div>
        </form>
    </div>







    <script>
        $(document).ready(function () {
            var myP_lat = $('#mylocation_lat').val();
            var myP_lng = $('#mylocation_lng').val();

            if (myP_lat != null && myP_lng != null) {
                // window.location = "http://127.0.0.1:8000/" + myP_lat + "," + myP_lng;
            }

            clickeoptionSearch(1);
        });
    </script>
@endsection

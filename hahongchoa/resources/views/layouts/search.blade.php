@section('search')
    <div class="embed-responsive embed-responsive-16by9 position-relative">
        <video width="100%" height="100%" loop autoplay>
            <source src="vdo/screen_motion_converttoAE_3.mp4" type="video/mp4">
        </video>
    </iframe>
    </div>
    <div class="col-12 col-md-6 position-absolute" style="margin-top: 130px;">

        <form action="/roomnearskytrian" method="post" class=" bg-white body_box-search">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active bg-active_tab_search" id="search-tab-nearlocation" data-toggle="tab"
                       href="#home" role="tab"
                       aria-controls="home" onclick="clickeoptionSearch(1)"
                       aria-selected="true">ค้นหาห้องใกล้ที่ทำงาน/มหาวิทยาลัย</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="search-tab-near_station" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false" onclick="clickeoptionSearch(2)">ค้นหาห้องใกล้สถานีรถไฟฟ้า</a>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
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

window.onload = getCurrentlocation();

// initMap
function getCurrentlocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log("not open position")
    }

    function showPosition(position) {
        console.log("open position" + position.coords.latitude);
        console.log("open position" + position.coords.longitude);

        $("#inputLat").val(position.coords.latitude);
        $("#inputLng").val(position.coords.longitude);

        $("#mylocation_lat").val(position.coords.latitude);
        $("#mylocation_lng").val(position.coords.longitude);

        $("#mylat").val(position.coords.latitude);
        $("#mylng").val(position.coords.longitude);


        initMap(position)
    }

    var map;
    var marker;

    function initMap(position) {
        var uluru = {lat: position.coords.latitude, lng: position.coords.longitude};
        map = new google.maps.Map(
            document.getElementById('map'), {zoom: 14, center: uluru});


        marker = new google.maps.Marker({position: uluru, map: map});

        map.addListener('click', function (e) {
            if (marker) {
                marker.setMap(null);
            }

            var Position_clike = {
                lat: e.latLng.lat(),
                lng: e.latLng.lng()
            };


            $("#inputLat").val(e.latLng.lat());
            $("#inputLng").val(e.latLng.lng());

            marker = new google.maps.Marker({position: Position_clike, map: map})

            // Pinmaker(Position_clike)
        });

    }


}


function loadDetailMap(lat,lng) {
    var lat = parseFloat($('#room_lat').val());
    var lng = parseFloat($('#room_lng').val());
    console.log("lat" + lat);

    var postionRoom = {lat, lng};
    var viewMap = document.getElementById('roommap');


    var map = new google.maps.Map(
        viewMap, {zoom: 14, center: postionRoom});


    var marker = new google.maps.Marker({position: postionRoom, map: map})


}


function selectbtnCheckbox() {

    var areaofinterest = '';
    var arrsss = [];


    $('[name="options_facility"]').each(function (i, e) {
        if ($(e).is(':checked')) {
            $('#border_faci' + i).addClass('facilities_active');
            var comma = areaofinterest.length === 0 ? '' : ',';
            var facilities = e.value.replace(".svg", '');
            // areaofinterest += (comma + facilities);
            arrsss.push(facilities)

        } else {
            $('#border_faci' + i).removeClass('facilities_active');

        }
    });
//bug ครั้งแรก
    console.log(arrsss);

    $('#facility').val(arrsss);

}


function optionCar() {


    $('[name="optioncar"]').each(function (i, e) {

        console.log("num" + i);
        if ($(e).is(':checked') === true) {
            $('#radio_car' + i).addClass('facilities_active');
            console.log("val::" + e.value);

        } else {
            $('#radio_car' + i).removeClass('facilities_active');

        }
    });
}


function smartSearch() {
    var chs_car = $('#optioncar').val();

    if (chs_car == "nothavecar") {

        $('#radio_car0').addClass('facilities_active');
    } else {
        $('#radio_car1').addClass('facilities_active');

    }
}


function optionprice() {
    var option = $('#sel1').val();
    window.location = "http://127.0.0.1:8000/roomnearskytrian/" + option;

    // alert(option)
}

function counttext() {
    var text = $('#hilight').val();
    $('#totaltext').html(text.length)
}


function querylocation() {
    var txtQuery = $('#lifestyleplace').val();
    var render = "";

    if (txtQuery != null || txtQuery != "") {

        $.ajaxSetup({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/room/query/' + txtQuery,
            success: function (res) {
                if (res.length != 0) {
                    $.each(res, function (index, item) {
                        console.log(res[index].namelocation);
                        console.log(res);
                        render += "<p id=\"result_search\" class=\'hover_item_search\'  onclick=\"clickSelectLocation(this)\">" + res[index].namelocation + "</p>\n"
                    });

                    $('#result-search').show();
                    $('#result-search').addClass('bg-search-box');
                    // $('#result-search').addClass('bg_corner');
                    $('#result-search').html(render);
                } else {
                    render = "";
                    console.log("null");
                    $('#result-search').hide();
                }

            },
            error: function (err) {
                console.log("err" + err[0]);
            }

        })

    } else {
        render = "";
        $('#result-search').hide();

    }
}

function clickSelectLocation(obj) {
    $('#lifestyleplace').val(obj.innerText);
    $('#result-search').hide();
}

function clickeoptionSearch(numpage) {

    $('#search-tab-nearlocation').click(function () {


        if ($('#search-tab-nearlocation').hasClass('active_tab_search')) {
            $('#search-tab-nearlocation').removeClass('bg-active_tab_search');


        } else {

            $('#search-tab-nearlocation').addClass('bg-active_tab_search');
            $('#search-tab-near_station').removeClass('bg-active_tab_search');
        }
    });


    $('#search-tab-near_station').click(function () {
        $('#search-tab-near_station').addClass('bg-active_tab_search');
        $('#search-tab-nearlocation').removeClass('bg-active_tab_search');

    });

    // console.log(numpage);
    var render = "";
    document.getElementById('myTabContent').innerHTML = "";

    switch (numpage) {
        case 1:
            // var a = "@include 'form-search_room' ";
            render = "    <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">\n" +
                "        <div class=\"col-12\">\n" +
                "            <div class=\"row mt-2\">\n" +
                "                <div class=\"col-12\">\n" +
                "                    <input type=\"text\" class=\"bg_corner border\" style=\"width:100%\"\n" +
                "                           placeholder=\"สถานที่ทำงาน / มหาวิทยาลัย\"\n" +
                "                           name=\"lifestyleplace\" id=\"lifestyleplace\" onkeyup=\"querylocation()\">\n" +
                "                </div>\n" +
                "            </div>\n" +
                "\n" +
                "            <div class=\"row mt-2\">\n" +
                "                <div class=\"col-12\" id=\"background_search\">\n" +
                "                    <div class=\"result-searc \" id=\"result-search\"></div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"row mt-2\">\n" +
                "                <div class=\"col-6\">\n" +
                "                    <input type=\"text\" class=\"bg_corner border\" style=\"width:100%\"\n" +
                "                           placeholder=\"ราคาถูกสุด\"\n" +
                "                           name=\"price_low\">\n" +
                "                </div>\n" +
                "                <div class=\"col-6\">\n" +
                "                    <input type=\"text\" class=\"bg_corner border\" style=\"width:100%\"\n" +
                "                           placeholder=\"ราคาแพงสุด\"\n" +
                "                           name=\"price_high\">\n" +
                "\n" +
                "                    <input type=\"text\" name=\"stat_search_option\" hidden value=\"search_nearLocation\">\n" +
                "                </div>\n" +
                "            </div>\n" +
                "\n" +
                "\n" +
                "            <div class=\"row mt-2\">\n" +
                "                <div class=\"col-md-6 col-6\">\n" +
                "                    <select class=\"bg_corner border\" name=\"person_live\" style=\"width: 100%;\">\n" +
                "                        <option selected>ผู้อยู่อาศัย</option>\n" +
                "                        <option value=\"1\">1</option>\n" +
                "                        <option value=\"2\">2</option>\n" +
                "                        <option value=\"3\">3</option>\n" +
                "                        <option value=\"4\">4</option>\n" +
                "                        <option value=\"5\">5</option>\n" +
                "                    </select>\n" +
                "                </div>\n" +


                "                <div class=\"row col-md-6\">\n" +
                "                    <div class=\"col-md-3 col-3\">\n" +
                "                        <label class=\" btn border\" id=\"radio_car0\">\n" +
                "                           <img src=\"http://" + window.location.host + "/icon/nocar.svg \" alt=\"\">\n" +
                "                            <input type=\"radio\" value=\"nothavecar\"\n" +
                "                                   name=\"optioncar\" class=\"invisible\" onclick=\"optionCar()\">\n" +
                "                        </label>\n" +
                "                    </div>\n" +
                "                    <div class=\"col-md-3 col-3\">\n" +
                "                        <label class=\"btn border\" id=\"radio_car1\">\n" +
                "                          <img src=\"http://" + window.location.host + "/icon/havecar.svg \" alt=\"\">\n" +
                "                            <input type=\"radio\" value=\"havecar\"\n" +
                "                                   name=\"optioncar\" class=\"invisible\" onclick=\"optionCar()\">\n" +
                "                        </label>\n" +
                "                    </div>\n" +
                "                    <div class=\"col form-group\">\n" +
                "                        <button type=\"submit\"\n" +
                "                                class=\"font-weight-normal text-white btn btn-default btn_green\"\n" +
                "                                style=\"width: 100%\">ค้นหา\n" +
                "                        </button>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "\n" +
                "        </div>\n" +
                "\n" +
                "    </div>\n";

            document.getElementById('myTabContent').innerHTML = render;
            break;
        case 2:
            render = "<div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">\n" +
                "        <div class=\"col-12\">\n" +
                "\n" +
                "            <div class=\"row mt-2\">\n" +
                "                <div class=\"col-12\" id=\"background_search\">\n" +
                "                    <div class=\"result-searc \" id=\"result-search\"></div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"row mt-2\">\n" +
                "                <div class=\"col-6\">\n" +
                "                    <input type=\"text\" class=\"bg_corner border\" style=\"width:100%\"\n" +
                "                           placeholder=\"ราคาถูกสุด\"\n" +
                "                           name=\"price_low\">\n" +
                "                </div>\n" +
                "                <div class=\"col-6\">\n" +
                "                    <input type=\"text\" class=\"bg_corner border\" style=\"width:100%\"\n" +
                "                           placeholder=\"ราคาแพงสุด\"\n" +
                "                           name=\"price_high\">\n" +
                "\n" +
                "                    <input type=\"text\" name=\"stat_search_option\" hidden value=\"search_nearBts\">\n" +
                "                </div>\n" +
                "            </div>\n" +
                "\n" +
                "\n" +
                "            <div class=\"row mt-2\">\n" +
                "                <div class=\"col-md-6 col-6\">\n" +
                "                    <select class=\"bg_corner border\" name=\"person_live\" style=\"width: 100%;\">\n" +
                "                        <option selected>จำนวนผู้อยู่อาศัย</option>\n" +
                "                        <option value=\"1\">1</option>\n" +
                "                        <option value=\"2\">2</option>\n" +
                "                        <option value=\"3\">3</option>\n" +
                "                        <option value=\"4\">4</option>\n" +
                "                        <option value=\"5\">5</option>\n" +
                "                    </select>\n" +
                "                </div>\n" +
                "                <div class=\"col-md-6 col-6\">\n" +
                "                    <select class=\"bg_corner border\" name=\"area_zone\" style=\"width: 100%;\">\n" +
                "                        <option selected>ใกล้สถานีรถไฟฟ้า</option>\n" +
                "                        <option value=\"1\">หมอชิต</option>\n" +
                "                        <option value=\"2\">สะพานควาย</option>\n" +
                "                        <option value=\"3\">อารีย์</option>\n" +
                "                        <option value=\"4\">สนามเป้า</option>\n" +
                "                        <option value=\"5\">อนุสาวรีย์ชัยสมรภูมิ</option>\n" +
                "                        <option value=\"6\">พญาไท</option>\n" +
                "                        <option value=\"7\">ราชเทวี</option>\n" +
                "                        <option value=\"8\">สยาม</option>\n" +
                "                        <option value=\"9\">ชิดลม</option>\n" +
                "                        <option value=\"10\">เพลินจิต</option>\n" +
                "                        <option value=\"11\">นานา</option>\n" +
                "                        <option value=\"12\">อโศก</option>\n" +
                "                        <option value=\"13\">พร้อมพงษ์</option>\n" +
                "                        <option value=\"14\">ทองหล่อ</option>\n" +
                "                        <option value=\"15\">เอกมัย</option>\n" +
                "                        <option value=\16\">พระโขนง</option>\n" +
                "                        <option value=\"17\">อ่อนนุช</option>\n" +
                "                        <option value=\"18\">บางจาก</option>\n" +
                "                        <option value=\"19\">ปุณณวิถี</option>\n" +
                "                        <option value=\"20\">อุดมสุข</option>\n" +
                "                        <option value=\"21\">บางนา</option>\n" +
                "                        <option value=\"22\">แบริ่ง</option>\n" +
                "                        <option value=\"23\">สนามกีฬา</option>\n" +
                "                        <option value=\"24\">ราชดำริ</option>\n" +
                "                        <option value=\"25\">ศาลาแดง</option>\n" +
                "                        <option value=\"26\">ช่องนนทรี</option>\n" +
                "                        <option value=\"27\">สุรศักดิ์</option>\n" +
                "                        <option value=\"28\">สะพานตากสิน</option>\n" +
                "                        <option value=\"29\">กรุงธนบุรี</option>\n" +
                "                        <option value=\"30\">วงเวียนใหญ่</option>\n" +
                "                        <option value=\"31\">โพธิ์นิมิตร</option>\n" +
                "                        <option value=\"32\">ตลาดพลู</option>\n" +
                "                        <option value=\"33\">วุฒากาศ</option>\n" +
                "                        <option value=\34\">บางหว้า</option>\n" +
                "                        <option value=\"35\">สำโรง</option>\n" +
                "                    </select>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "                <div class=\"row mt-2\">\n" +
                "                    <div class=\"col-md-2 col-2\">\n" +
                "                        <label class=\" btn border\" id=\"radio_car0\">\n" +
                "                            <img src=\"http://" + window.location.host + "/icon/nocar.svg \" alt=\"\">\n" +
                "                            <input type=\"radio\" value=\"nothavecar\"\n" +
                "                                   name=\"optioncar\" class=\"invisible\" onclick=\"optionCar()\">\n" +
                "                        </label>\n" +
                "                    </div>\n" +
                "                    <div class=\"col-md-2 col-2\">\n" +
                "                        <label class=\"btn border\" id=\"radio_car1\">\n" +
                "                            <img src=\"http://" + window.location.host + "/icon/havecar.svg\" alt=\"\">\n" +
                "                            <input type=\"radio\" value=\"havecar\"\n" +
                "                                   name=\"optioncar\" class=\"invisible\" onclick=\"optionCar()\">\n" +
                "                        </label>\n" +
                "                    </div>\n" +
                "                    <div class=\"col-md-8 form-group\">\n" +
                "                        <button type=\"submit\"\n" +
                "                                class=\"font-weight-normal text-white btn btn-default btn_green\"\n" +
                "                                style=\"width: 100%\">ค้นหา\n" +
                "                        </button>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "\n" +
                "        </div>\n" +
                "\n" +
                "    </div>";

            document.getElementById('myTabContent').innerHTML = render;


            break;
        default:

    }
    return numpage;
}


function herfLocationTocontact(url) {
    window.location = url

}

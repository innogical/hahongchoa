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


function loadDetailMap() {
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


    // console.log(result)
    // console.log("result:" + facilities)


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
    $.ajaxSetup({
        header: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/room/query/' + txtQuery,
        success: function (res) {
            $.each(res, function (position) {
                console.log(res[position].namelocation);
                render += "<p id=\"result_search\" onclick=\"clickSelectLocation(this)\">" + res[position].namelocation + "</p>\n"
            });

            $('#result-search').show();
            $('#result-search').html(render);
        },
        error: function (err) {
            console.log("err" + err);
        }

    })

}

function clickSelectLocation(obj) {

    $('#lifestyleplace').val(obj.innerText);
    $('#result-search').hide();
}



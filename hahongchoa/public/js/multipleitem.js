// var myDropzone = new Dropzone("#dropzone", { url: "/file/post"});
window.onload = getCurrentlocation()
initMap
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
        initMap(position)
    }
    var map;
    function initMap(position) {
        var uluru = {lat: position.coords.latitude, lng:  position.coords.longitude};
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 14, center: uluru});
        var marker = new google.maps.Marker({position: uluru, map: map})
    }




}
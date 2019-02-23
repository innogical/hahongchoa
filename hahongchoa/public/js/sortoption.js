$(document).ready(function () {
    //
    $('#btn_compare').hide();
    $('#show_option_filter').hide();
    $('#btn_filter').click(function () {
        $('#show_option_filter').toggle("slow", function () {

        });

    });

});

var arrRoomid = [];

function compareRoom(idroom) {
    arrRoomid.push(idroom);


    console.log(arrRoomid);
    console.log("compare id " + arrRoomid);
    if (arrRoomid.length == 2) {
        $('#btn_compare').show();
        $('#btn_compare').click(function () {

            gocomPareroom(arrRoomid[0], arrRoomid[1])
        });

    } else {
        $('#btn_compare').hide();
    }

    $('#compareRoom').val(arrRoomid);

}

function gocomPareroom(roomid1, roomid2) {
    window.location.href =  "/roomnearskytrian/compare/" + roomid1 + "/" + roomid2;

    console.log(window.location.host);
    console.log(window.location.hostname);
}


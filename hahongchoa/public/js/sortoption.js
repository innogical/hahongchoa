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
    // if (arrRoomid.length < 2 || arrRoomid.length == 0) {

    if (arrRoomid.length < 2 || arrRoomid.includes(idroom)) {

        var t = arrRoomid.includes(idroom);

        console.log("status", t);
        if (t) {
            console.log("not add", t);

            // var swq = arrRoomid.filter(e => e !== idroom);
            var swq = arrRoomid.splice(arrRoomid.indexOf(idroom), 1);
            console.log('getid', swq);

            $('#select_com' + idroom).removeClass("hover_item_room_select_compare");
            $('#select_com' + idroom).addClass("hover_item_room");
        } else {

            $('#select_com' + idroom).addClass("hover_item_room_select_compare");
            $('#select_com' + idroom).removeClass("hover_item_room");
            arrRoomid.push(idroom);
        }
    }else {
        alert("สามารถเลือกห้องได้เพียง2ห้องเท่านั้น")

    }

    console.log("compare id ", arrRoomid);
    //
    // if (arrRoomid.length > 2) {
    //     alert("สามารถเลือกห้องได้เพียง2ห้องเท่านั้น")
    //
    // }
    // else {
    //     alert("สามารถเลือกห้องได้เพียง2ห้องเท่านั้น")
    // }

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


function activeSelectRoom(index_room) {

    $('#select_com' + index_room).addClass('active_compare_room');


}


function gocomPareroom(roomid1, roomid2) {
    window.location.href = "/roomnearskytrian/compare/" + roomid1 + "/" + roomid2;

    console.log(window.location.host);
    console.log(window.location.hostname);
}


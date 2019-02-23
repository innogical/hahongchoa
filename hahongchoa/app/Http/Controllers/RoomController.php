<?php

namespace App\Http\Controllers;

use App\Adroom;
use App\Imageroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
//        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        //
//dd($id);
//        return $id;
        $room = DB::table('room')
            ->select('*', 'bts_station.lat AS bts_lat', 'bts_station.lng AS bts_lng', 'room.lat AS room_lat', 'room.lng AS room_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('lease', 'lease.id', '=', 'room.lease_id')
            ->join('user', 'user.id', '=', 'room.user_id')
            ->join('imageRoom', 'imageRoom.roomid', '=', 'room.id')
            ->groupBy('imageRoom.img_id')
            ->where('room.id', '=', $id)->get();


        $idRoom = $room->first(); //new unwrap collection

        $img_air = Imageroom::where('roomid', '=', $idRoom->id)->get();
        $room_facility = DB::table('room_facility')->where('room_facility.room_id', '=', $idRoom->id)
            ->get();

        $arr_roomid = [];
        $arr_cal = [];


        foreach ($room_facility as $Aroom) {
            array_push($arr_roomid, $Aroom->facility_id);
        }


        $distance_form_roomTobts = $this->calRouteAndTime($idRoom->room_lat, $idRoom->room_lng, $idRoom->bts_lat, $idRoom->bts_lng);

//        array_push($arr_cal, $distance_form_roomTobts[0], $distance_form_roomTobts[1]);

//        return $arr_cal;
        foreach ($room_facility as $Aroom) {
            array_push($arr_roomid, $Aroom->facility_id);
        }

        $Facilityofroom = DB::table('facility')->whereIn('facility.id', $arr_roomid)->get();
//        return $Facilityofroom;


        $mapRoom_detail_facility = $Facilityofroom->map(function ($item, $key) use ($arr_roomid) {
            $item->pathImagr_facility = $arr_roomid[$key];
            return $item;
        });

        $mapdata_room = $room->map(function ($item, $key) use ($distance_form_roomTobts) {
            $item->time = $distance_form_roomTobts[0];
            $item->distance = $distance_form_roomTobts[1];
            return $item;
        });


        $TotelRoom = $mapdata_room->first();

        return view('detailroom', compact('TotelRoom', 'img_air', 'mapRoom_detail_facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function listroom()
    {

        $newRoom = DB::table('room')
            ->select('*', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('imageRoom', 'imageRoom.roomid', '=', 'room.id')
            ->join('zone', 'zone.id', '=', 'room.zone_id')
            ->orderBy('room.created_at')
            ->groupBy('imageRoom.roomid')
            ->get();

        $reccomdRoom = DB::table('room')
            ->select('*', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('imageRoom', 'imageRoom.roomid', '=', 'room.id')
            ->join('zone', 'zone.id', '=', 'room.zone_id')
            ->orderBy('room.price')
            ->groupBy('imageRoom.roomid')
            ->get();


        $mapdataNearby = [];

        $listbts = $this->Zonebts_near();


        return view('welcome', compact('newRoom', 'mapdataNearby', 'reccomdRoom', 'listbts'));
    }

    function Zonebts_near()
    {

        $bts_lists = DB::table('bts_station')->get();
        return $bts_lists;

    }

    public function querySeach($txtquery)
    {
        $search = DB::table('searchlocation')
            ->where('namelocation', 'like', '%' . $txtquery . '%')
            ->get();

        return response()->json($search);
    }

    function calRouteAndTime($mylat, $mylng, $room_lat, $room_lng)
    {

        $client = new Client();
        $res = $client->request('GET', 'https://route.api.here.com/routing/7.2/calculateroute.json', [
            'query' => ['waypoint0' => 'geo!' . $mylat . ',' . $mylng,
                'waypoint1' => 'geo!' . $room_lat . ',' . $room_lng,
                'mode' => 'fastest;car;traffic:disabled',
                'app_id' => 'kAiUxjQatCyWtXjOf6f3',
                'app_code' => 'Yon71VCM7Qbc9ELCymSPTw'
            ]
        ]);

        $data = json_decode($res->getBody()->getContents(), true);
        $summaryloop = $data["response"]["route"];

        foreach ($summaryloop as $item) {

            $s_sumarry = $item['summary']['distance'];
            $baseTime = $item['summary']['baseTime'] / 60;
        }
        $objCalrouteandTime = [$s_sumarry, $baseTime];


        return $objCalrouteandTime;


    }

    public function nearRoom($lat, $lng)
    {


        $newRoom = DB::table('room')
            ->select('*', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('imageRoom', 'imageRoom.roomid', '=', 'room.id')
            ->join('zone', 'zone.id', '=', 'room.zone_id')
            ->orderBy('room.created_at')
            ->groupBy('imageRoom.roomid')
            ->get();

//        return $newRoom;

        $reccomdRoom = DB::table('room')
            ->select('*', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('imageRoom', 'imageRoom.roomid', '=', 'room.id')
            ->join('zone', 'zone.id', '=', 'room.zone_id')
            ->orderBy('room.price')
            ->groupBy('imageRoom.roomid')
            ->get();


        $arr_listnearRoom = [];

        foreach ($newRoom as $a_nearRoom) {

            $roomlat = $a_nearRoom->lat;
            $roomlng = $a_nearRoom->lng;
            $listnearRoom = $this->calRouteAndTime($lat, $lng, $roomlat, $roomlng);

            array_push($arr_listnearRoom, $listnearRoom);


        }
        $zone = $this->Zonebts_near();
        $mapdataNearby = $newRoom->map(function ($item, $key) use ($arr_listnearRoom) {

            $item->time = $arr_listnearRoom[$key][0];
            $item->distance = $arr_listnearRoom[$key][1];

            return $item;
        });


        return view('welcome', compact('newRoom', 'reccomdRoom', 'mapdataNearby', 'zone'));

//        return $mapdataNearby;
    }

    function caLDistanceAndtime($my_position_lat, $my_position_lng, $room_lat, $room_lng)
    {

        $client = new Client();
        $res = $client->request('GET', 'https://route.api.here.com/routing/7.2/calculateroute.json', [
            'query' => ['waypoint0' => 'geo!' . $my_position_lat . ',' . $my_position_lng,
                'waypoint1' => 'geo!' . $room_lat . ',' . $room_lng,
                'mode' => 'fastest;car;traffic:disabled',
                'app_id' => 'kAiUxjQatCyWtXjOf6f3',
                'app_code' => 'Yon71VCM7Qbc9ELCymSPTw'
            ]
        ]);
        $data = json_decode($res->getBody()->getContents(), true);
        $summaryloop = $data["response"]["route"];

        foreach ($summaryloop as $item) {

            $s_sumarry = $item['summary']['distance'];
            $baseTime = $item['summary']['baseTime'];
        }
        $objCalrouteandTime = [$s_sumarry, $baseTime];
        return $objCalrouteandTime;
    }


    public function compareRoom($idroom1, $idroom2)
    {
        $room1 = Adroom::where('id', '=', $idroom1)->get();
        $room2 = Adroom::where('id', '=', $idroom2)->get();

        $idroom1 = $room1[0]->id;
        $idroom2 = $room2[0]->id;

//        return $room1;

        $findimg_room1 = DB::table('imageRoom')
            ->where('imageRoom.roomid', '=', $idroom1)
            ->get();


        $findimg_room2 = DB::table('imageRoom')
            ->where('imageRoom.roomid', '=', $idroom2)
            ->get();

        $leas_room1 = DB::table('lease')->where('lease.id', '=', $room1[0]->lease_id)
            ->first();


        $leas_room2 = DB::table('lease')->where('lease.id', '=', $room2[0]->lease_id)
            ->first();


//        return [$leas_room1, $leas_room2];

        $room1_facility = DB::table('room_facility')
            ->select('facility_id')
            ->where('room_facility.room_id', '=', $idroom1)
            ->get();
        $room2_facility = DB::table('room_facility')
            ->select('facility_id')
            ->where('room_facility.room_id', '=', $idroom2)
            ->get();

//        return [$room1_facility, $room2_facility];

        $arr_keepidRoom1 = [];
        $arr_keepidRoom2 = [];

        foreach ($room1_facility as $Facility_1) {
            array_push($arr_keepidRoom1, $Facility_1->facility_id);
        }
        foreach ($room2_facility as $Facility_2) {
            array_push($arr_keepidRoom2, $Facility_2->facility_id);
        }
//
////        return ["id-facility" => $arr_keepidRoom1, "id-facility-2" => $arr_keepidRoom2];

        $facilityOfroom_1 = DB::table('facility')->whereIn('facility.id', $arr_keepidRoom1)
            ->get();
        $facilityOfroom_2 = DB::table('facility')->whereIn('facility.id', $arr_keepidRoom2)
            ->get();


//        return $facilityOfroom_2;

        $mapdata_room1 = $room1->map(function ($item, $key) use ($findimg_room1,$leas_room1){

        $item->imageRoom = $findimg_room1[0];
        $item->lease = $leas_room1->laase_duration;
        return $item;
    });


        $mapdata_room2 = $room1->map(function ($item, $key) use ($findimg_room2, $leas_room2) {
            $item->imageRoom = $findimg_room2[0];
            $item->lease = $leas_room2->laase_duration;
            return $item;
        });


        $aroom_1 = $room1->first();
        $aroom_2 = $room2->first();
        $img_room1 = $mapdata_room1->first();
        $img_room2 = $mapdata_room2->first();

//        return [$img_room1,$img_room2];

        return view('compareroom', compact('aroom_1', 'aroom_2', 'img_room1', 'img_room2', 'facilityOfroom_1', 'facilityOfroom_2'));


    }


}

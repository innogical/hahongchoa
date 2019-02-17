<?php

namespace App\Http\Controllers;

use App\Adroom;
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
        return view('detailroom', compact('id'));
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
//        if ($request->mylat != null && $request->mylng != null) {
//
//            echo $request->mylat;
////            return ["lat" =>$request->mylat,"lng"=>$request->mylng];
//        }


        $zone = $this->Zonebts_near();


        return view('welcome', compact('newRoom', 'mapdataNearby', 'reccomdRoom', 'zone'));
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
            $baseTime = $item['summary']['baseTime'] / 60;
        }
        $objCalrouteandTime = [$s_sumarry, $baseTime];
        return $objCalrouteandTime;
    }
}

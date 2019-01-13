<?php

namespace App\Http\Controllers;

use App\Adroom;
use App\Search;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $zone = ['สวนสาธารณะ', 'แหล่งต่างชาติ', 'ห้างสรรพสินค้า', 'แนวรถไฟฟ้า', 'ตลาดนัดกลางคืน'];
        $icon = ['havecar.svg', 'nocar.svg'];

        return view('smartsearch', compact('zone', 'icon'));
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

        $price_low = $request->price_low;
        $price_high = $request->price_high;
        $person_live = $request->person_live;
        $area_zone = $request->area_zone;
        $lifestyle_location = $request->lifestyleplace;
        $optioncar = $request->optioncar;

//my latlng
        $mylocation_lat = $request->mylocation_lat;
        $mylocation_lng = $request->mylocation_lng;


//        dd($optioncar,$lifestyle_location);
        $search = DB::table('searchlocation')
            ->where('namelocation', 'like', '%' . $lifestyle_location . '%')
            ->get();

        foreach ($search as $search_item) {

// location form search
            $place_lat_away = $search_item->lat;
            $place_lng_away = $search_item->lng;


        }
        $roomlists = $this->getListRoom();


//        dd($roomlists);


        $calRoute = [];

        foreach ($roomlists as $list_room) {
            $nameRoom = $list_room->name;
            $size = $list_room->size;
            $personLive = $list_room->personLive;
            $room_lat = $list_room->lat;
            $room_lng = $list_room->lng;

            array_push($calRoute, $this->calRouteAndTime($place_lat_away, $place_lng_away, $room_lat, $room_lng));
        }
//        dd($calRoute);
//

        $result = $roomlists->map(function ($item, $key) use ($calRoute) {

            foreach ($calRoute as $subItem) {
                $item->distance = $subItem[0];
                $item->time = $subItem[1];
            }
            return $item;
        });

//        dd($result);

        if ($result) {
            return view('smartsearch',
                compact('result','lifestyle_location','price_low','price_high','person_live','area_zone','optioncar'));
        } else {
            return "ไม่มีข้อมูลการค้นหา";
        }

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


    function getListRoom()
    {

        $room = DB::table('room')
            ->select('*', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('imageRoom', 'imageRoom.roomid', '=', 'room.id')
            ->join('zone', 'zone.id', '=', 'room.zone_id')
            ->get();

//        dd($room);

        return $room;
    }

    function calRouteAndTime($place_lat_away, $place_lng_away, $room_lat, $room_lng)
    {

        $client = new Client();
        $res = $client->request('GET', 'https://route.api.here.com/routing/7.2/calculateroute.json', [
            'query' => ['waypoint0' => 'geo!' . $place_lat_away . ',' . $place_lng_away,
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

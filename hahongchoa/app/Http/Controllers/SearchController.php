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

        $icon = ['havecar.svg', 'nocar.svg'];
        $zone = $this->zoneBts();


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
        $sortprice = $request->sortprice;
        $sortdistance = $request->sortdistance;

//my latlng
        $mylocation_lat = $request->mylocation_lat;
        $mylocation_lng = $request->mylocation_lng;


        $notfound = "notfound";


        // location form search
        $search = DB::table('searchlocation')
            ->where('namelocation', 'like', '%' . $lifestyle_location . '%')
            ->first();


        if ($search != null) {

            $search_lat_away = $search->lat;
            $search_lng_away = $search->lng;
        } else {
            return redirect('/')->with(['data' => $notfound]);
        }

//        if ($sortprice == "low" && $sortdistance == "near") {
//
//
//        } else if ($sortprice == "low" && $sortdistance == "far") {
//
//
//
//        } else if ($sortprice == "high" && $sortdistance == "near") {
//
//
//
//        } else if ($sortprice == "high" && $sortdistance == "far") {
//
//
//
//        }

        $zone_bts = $this->getBtsstationlist();
        if ($optioncar == "nothavecar") {
//ไม่มีรถ/////////////
            if ($sortprice == "low" && $sortdistance == "near") {

                $listRoom = $this->getListRoom($person_live, $price_low, $price_high,$sortprice);

                $pot_station_bts = $this->getBtsstationlist();

                foreach ($pot_station_bts as $bts) {
                    $place_lat_away = $bts->lat;
                    $place_lng_away = $bts->lng;
                }

                $val_roomFormlistroom = $this->nothavecar($listRoom, $place_lat_away, $place_lng_away);
                $sort = $val_roomFormlistroom->sortBy('distance')->sortBy('price');

//                return $sort;
                $result = $sort->values()->all();

            } else if ($sortprice == "low" && $sortdistance == "far") {


                $listRoom = $this->getListRoom($person_live, $price_low, $price_high,$sortprice);

                $pot_station_bts = $this->getBtsstationlist();

                foreach ($pot_station_bts as $bts) {
                    $place_lat_away = $bts->lat;
                    $place_lng_away = $bts->lng;
                }

                $val_roomFormlistroom = $this->nothavecar($listRoom, $place_lat_away, $place_lng_away);
                $sort = $val_roomFormlistroom->sortByDesc('distance')->sortBy('price');

//                return $sort;
                $result = $sort->values()->all();


            } else if ($sortprice == "high" && $sortdistance == "near") {


                $listRoom = $this->getListRoom($person_live, $price_low, $price_high,$sortprice);
                $pot_station_bts = $this->getBtsstationlist();

                foreach ($pot_station_bts as $bts) {
                    $place_lat_away = $bts->lat;
                    $place_lng_away = $bts->lng;
                }

                $val_roomFormlistroom = $this->nothavecar($listRoom, $place_lat_away, $place_lng_away);
                $sort = $val_roomFormlistroom->sortBy('distance')->sortByDesc('price');

//                return $sort;
                $result = $sort->values()->all();




            } else if ($sortprice == "high" && $sortdistance == "far") {


                $listRoom = $this->getListRoom($person_live, $price_low, $price_high,$sortprice);
                $pot_station_bts = $this->getBtsstationlist();

                foreach ($pot_station_bts as $bts) {
                    $place_lat_away = $bts->lat;
                    $place_lng_away = $bts->lng;
                }

                $val_roomFormlistroom = $this->nothavecar($listRoom, $place_lat_away, $place_lng_away);
                $sort = $val_roomFormlistroom->sortByDesc('distance')->sortByDesc('price');

//                return $sort;
                $result = $sort->values()->all();


            }


//            $listRoom = $this->getListRoom($person_live, $price_low, $price_high,);
//            dd($listRoom);


//            $pot_station_bts = $this->getBtsstationlist();
//
//            foreach ($pot_station_bts as $bts) {
//                $place_lat_away = $bts->lat;
//                $place_lng_away = $bts->lng;
//            }
//
//            $val_roomFormlistroom = $this->nothavecar($listRoom, $place_lat_away, $place_lng_away);
//            $result = $val_roomFormlistroom;
        }


        else {
            //มีรถ
//            $mylocation_lat = $request->mylocation_lat;
//            $mylocation_lng = $request->mylocation_lng;

            $listRoom = $this->getListRoom($person_live, $price_low, $price_high);
            $valresult_havecar = $this->havecar($listRoom, $search_lat_away, $search_lng_away);

            $result = $valresult_havecar;

        }

        if ($result != null) {
            return view('smartsearch', compact('result', 'zone_bts', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'area_zone', 'optioncar'));
        } else {
            return redirect('/')->with(['data' => $notfound]);
        }
//        dd($result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        //
//        if ($id == "lowtohigh"){
//
//        }else {
//
//
//        }

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


    function getListRoom($personlive, $price_lower, $price_higher,$rangePrice)
    {
        $chs_rangeprice = "";
        if ($rangePrice == "low"){
            $chs_rangeprice = "asc";

        }else if ($rangePrice =="high"){
            $chs_rangeprice = "desc";

        }
        $room = DB::table('room')
            ->select('*', 'room.id AS roomid', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->where('room.personLive', '=', '' . $personlive)
            ->whereBetween('room.price', [$price_lower, $price_higher])
//            ->orderBy('room.price', $chs_rangeprice)
            ->get();

//        dd($room);
//        return $room;


        $arrimgroom = [];
        foreach ($room as $aRoom_l) {
//            $imgroom = $this->imageRoomloop($aRoom_l->id);
//            echo $aRoom_l->roomid;
            $imgroom = $this->imageRoomloop($aRoom_l->roomid);

            array_push($arrimgroom, $imgroom);
        }

//        dd($arrimgroom);

        $itemArr = [];
        foreach ($arrimgroom as $index => $subItem) {
            array_push($itemArr, $subItem->pathimg);
        }


        $RoomFullsetattr = $room->map(function ($item, $key) use ($itemArr) {

//            foreach ($arrimgroom as $subItem) {
            $item->imgRoomF = $itemArr[$key];
//            }
            return $item;
        });

        return $RoomFullsetattr;

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

    function getBtsstationlist()
    {
        $bts_lists = DB::table('bts_station')->get();

        return $bts_lists;

    }


    function zoneBts()
    {
        $bts_lists = DB::table('zone')->get();
        return $bts_lists;

    }

    function havecar($listroom, $place_lifestyle_lat, $place_lifestyle_lng)
    {
        $calRoute = [];
        foreach ($listroom as $room) {
            $place_lat_away = $room->lat;
            $place_lng_away = $room->lng;
            array_push($calRoute, $this->calRouteAndTime($place_lat_away, $place_lng_away, $place_lifestyle_lat, $place_lifestyle_lng));
        }

        $result = $listroom->map(function ($item, $key) use ($calRoute) {
            $item->time = $calRoute[$key][0];
            $item->distance = $calRoute[$key][1];

            return $item;
        });


        return $result;


    }


    function nothavecar($listroom, $bts_station_lat, $bts_station_lng)
    {

        $calRoute = [];

        foreach ($listroom as $room) {
            $place_lat_away = $room->lat;
            $place_lng_away = $room->lng;
            array_push($calRoute, $this->calRouteAndTime($place_lat_away, $place_lng_away, $bts_station_lat, $bts_station_lng));
        }

        $result = $listroom->map(function ($item, $key) use ($calRoute) {
            $item->time = $calRoute[$key][0];
            $item->distance = $calRoute[$key][1];

            return $item;
        });


        return $result;
    }

    function imageRoomloop($roomid)
    {
        $imgroom = DB::table('imageRoom')
            ->where('imageRoom.roomid', '=', $roomid)
            ->groupBy('roomid')
            ->first();
//            dd($imgroom);
        return $imgroom;
    }


}

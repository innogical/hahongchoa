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
        $price_low = $request->price_low;
        $price_high = $request->price_high;
        $person_live = $request->person_live;
        $area_zone = $request->area_zone;
        $lifestyle_location = $request->lifestyleplace;
        $optioncar = $request->optioncar;


        $stat_search_option = $request->stat_search_option;


        $notfound = "notfound";
        $zone_bts = [];

        if ($stat_search_option == "search_nearLocation") {


            if ($lifestyle_location != null) {

                $search = DB::table('searchlocation')
                    ->where('namelocation', 'like', '%' . $lifestyle_location . '%')
                    ->first();

                if ($search != null) {
//
                    $search_lat_away = $search->lat;
                    $search_lng_away = $search->lng;


//                    $zone_bts = $this->getBtsstationlist();


                    if ($optioncar == "nothavecar") {


                        $listRoom = $this->getListRoom($person_live, $price_low, $price_high);

                        $val_roomFormlistroom = $this->nothavecar($listRoom, $search_lat_away, $search_lng_away);
                        $result = $val_roomFormlistroom->sortBy('price');

                    } else {
//
                        $listRoom = $this->getListRoom($person_live, $price_low, $price_high);
                        $pot_station_bts = $this->getBtsstationlist();
                        foreach ($pot_station_bts as $bts) {
                            $place_lat_away = $bts->lat;
                            $place_lng_away = $bts->lng;
                        }

                        $valresult_havecar = $this->havecar($listRoom, $place_lat_away, $place_lng_away);
                        $result = $valresult_havecar->sortBy('price');

                    }

                    if ($result != null || $result != []) {
                        return view('smartsearch', compact('result', 'zone_bts', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'area_zone', 'optioncar'));

                    } else {
                        return redirect('/')->with(['data' => $notfound]);
                    }

                }

            }

        } else {

            //search section find room near bts only !!!
//            return ["person"=>$person_live,"pricelow"=>$price_low,"pricehigh"=>$price_high,"btsstation"=>$area_zone];
            $zone_bts = $this->getBtsstationlist();
            if ($optioncar == "nothavecar") {

                $listRoom = $this->getListRoom($person_live, $price_low, $price_high);
                $pot_station_bts = $this->getBtsstationlist();
                foreach ($pot_station_bts as $bts) {
                    $place_lat_away = $bts->lat;
                    $place_lng_away = $bts->lng;
                }

                $val_roomFormlistroom = $this->nothavecar($listRoom, $place_lat_away, $place_lng_away);
                $result = $val_roomFormlistroom->sortBy('price');

            } else {

                $listRoom = $this->getListRoom($person_live, $price_low, $price_high);
                $pot_station_bts = $this->getBtsstationlist();
                foreach ($pot_station_bts as $bts) {
                    $place_lat_away = $bts->lat;
                    $place_lng_away = $bts->lng;
                }

                $valresult_havecar = $this->havecar($listRoom, $place_lat_away, $place_lng_away);

                $result = $valresult_havecar->sortBy('price');


            }

            if ($result != null || $result != []) {
                return view('smartsearch', compact('result', 'zone_bts', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'area_zone', 'optioncar'));

            } else {
                return redirect('/')->with(['data' => $notfound]);
            }

        }
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }


    function getListRoom($personlive, $price_lower, $price_higher)
    {

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
        return $imgroom;
    }


    public function sorTval(Request $request)
    {
        $dataSearch = json_decode($request->dataAll);
        $sortDistance = $request->sortDistnce;
        $sortPrice = $request->sortPrice;

        $price_low = $request->price_low;
        $price_high = $request->price_high;
        $person_live = $request->person_live;
        $area_zone = $request->area_zone;
        $lifestyle_location = $request->lifestyle_location;
        $optioncar = $request->optioncar;
////
//        $price_low = "";
//        $price_high = "";
//        $person_live = "";
//        $area_zone =" ";
//        $lifestyle_location ="";
//        $optioncar ="";

        $zone_bts = [];


//        return $dataSearch;

        $collectio_data = collect($dataSearch);


//        dd($collectio_data);

        if ($sortPrice == "priceLow" && $sortDistance == "distaceAsc") {
            $newsortdata = $collectio_data->sortBy('price')->sortBy('distance');
        } else if ($sortPrice == "priceLow" && $sortDistance == "distaceDesc") {
            $newsortdata = $collectio_data->sortBy('price')->sortByDesc('distance');
        } else if ($sortPrice == "priceHigh" && $sortDistance == "distaceAsc") {
            $newsortdata = $collectio_data->sortByDesc('price')->sortBy('distance');
        } else if ($sortPrice == "priceHigh" && $sortDistance == "distaceDesc") {
            $newsortdata = $collectio_data->sortByDesc('price')->sortByDesc('distance');
        }

        //todo:: มันเรียงจริงหรือไม่


//        $result = $newsortdata;
//        $result = $newsortdata->values()->all();

//        return $newsortdata;
//        return [
//            "data" => $result,
//            "zonebtn" => $zone_bts,
//            "lifestyle" => $lifestyle_location,
//            "priceLow " => $price_low,
//            "pricehigiht" => $price_high,
//            "person_live" => $person_live,
//            "areazzone" => $area_zone,
//            "optioncar" => $optioncar,
//        ];
//        return view('component.card-list-smartsearch',compact('result'));
        return view('smartsearch', compact('result', 'zone_bts', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'area_zone', 'optioncar'));


    }

}

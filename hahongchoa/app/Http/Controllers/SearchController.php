<?php

namespace App\Http\Controllers;

use App\Adroom;
use App\Btsstation;
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
//        return $request;

        $price_low = $request->price_low;
        $price_high = $request->price_high;
        $person_live = $request->person_live;
        $station_bts = $request->area_zone;
        $lifestyle_location = $request->lifestyleplace;
        $optioncar = $request->optioncar;

//        $mylocation_lat = $request->mylocation_lat;
//        $mylocation_lng = $request->mylocation_lng;


        $stat_search_option = $request->stat_search_option;


//        return $request;
        $notfound = "notfound";
        $zone_bts = [];


        $name_bts_select = Btsstation::find($station_bts);

//        return $name_bts_select;
        switch ($stat_search_option) {

            case "search_nearLocation":

                $station_bts = "";

//                return $station_bts;
//
//                if ($station_bts == "" || $station_bts == null){
//
//
//
//                }else{
//                    return "not null";
//                }

                if ($lifestyle_location != null) {

                    $search = DB::table('searchlocation')
                        ->where('namelocation', 'like', '%' . $lifestyle_location . '%')
                        ->first();

                    $lifestyle_location = $search->namelocation;

                    if ($search != null) {
//
                        $search_lat_away = $search->lat;
                        $search_lng_away = $search->lng;

                        if ($optioncar == "nothavecar") {
                            /////nothavecar
                            ///
                            ///
                            $listRoom = $this->getListRoom($person_live, $price_low, $price_high);

                            if ($listRoom == null || sizeof($listRoom) == 0 || count($listRoom) == 0) {
//                                return redirect()->back()->withErrors(['data' => $notfound]);
                                return redirect('/')->with('data', "ไม่พบข้อมูล");

                            }


                            $val_roomFormlistroom = [];

                            $getnear_bts = DB::table('bts_station')->find($search->near_bts);
                            $val_roomFormlistroom = $this->nothavecarnearBts($listRoom, $getnear_bts->lat, $getnear_bts->lng);

                            $result = $val_roomFormlistroom->sortBy('price');

//                            dd(count($result));
//                            dd(is_array($result));

                            if ($result != null || $result != [] || sizeof($result) != 0 || $result != "" || is_array($result) || count($result) != 0) {
                                return view('smartsearch', compact('result', 'stat_search_option', 'zone_bts', 'station_bts', 'name_bts_select', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'optioncar', 'stat_search_option'));

//                                return redirect('/')->withErrors(['data' => $notfound]);
                            } else {
                                return redirect('/')->with('data', "ไม่พบข้อมูล");
                            }

                        } else {
//// havecar
                            $listRoom = $this->getListRoom($person_live, $price_low, $price_high);

                            if ($listRoom == null || sizeof($listRoom) == 0 || count($listRoom) == 0) {
//                                return redirect()->back()->withErrors(['data' => $notfound]);
                                return redirect('/')->with('data', "ไม่พบข้อมูล");
                            }


                            $valresult_havecar = $this->havecar($listRoom, $search_lat_away, $search_lng_away);
                            $result = $valresult_havecar->sortBy('price');
//
                            if ($result != null || $result != [] || sizeof($result) != 0 || $result != "" || is_array($result) || count($result) != 0) {
                                return view('smartsearch', compact('result', 'stat_search_option', 'zone_bts', 'station_bts', 'name_bts_select', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'optioncar', 'stat_search_option'));


//                                return redirect('/')->withErrors(['data' => $notfound]);
                            } else {
                                return redirect('/')->with('data', "ไม่พบข้อมูล");
                            }

                        }

                    } else {
                        return redirect('/')->with('data', "ไม่มีสถานที่นี้");
                    }

                } else {
                    return redirect('/')->with('data', "มีบางอย่างผิดพลาด");
                }


                break;


            case "search_nearBts":

//                return $request;
                //search section find room near bts only !!!

//            return ["person"=>$person_live,"pricelow"=>$price_low,"pricehigh"=>$price_high,"btsstation"=>$station_bts];
                $zone_bts = $this->getBtsstationlist();
                $bts_location = DB::table('bts_station')->find($station_bts);

//dd($bts_location);
//                if ($optioncar == "nothavecar") {

                $listRoom = $this->getListRoomcasebts_station($person_live, $price_low, $price_high, $station_bts);


                if ($listRoom == null || sizeof($listRoom) == 0 || count($listRoom) == 0) {
//                                return redirect()->back()->withErrors(['data' => $notfound]);
                    return redirect('/')->with('data', "ไม่พบข้อมูล");
                }

                $pot_station_bts = $this->getBtsstationlist();


//                return $pot_station_bts;
                $val_roomFormlistroom = [];
//                foreach ($pot_station_bts as $bts) {
//                    $place_lat_away = $bts->lat;
//                    $place_lng_away = $bts->lng;

                $val_roomFormlistroom = $this->nothavecar($listRoom);
//                }
                $result = $val_roomFormlistroom->sortBy('price');

                if ($result != null || $result != [] || sizeof($result) != 0 || $result != "" || is_array($result) || count($result) != 0) {
                    return view('smartsearch', compact('result', 'stat_search_option', 'zone_bts', 'station_bts', 'name_bts_select', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'optioncar', 'stat_search_option'));

                } else {
                    return redirect('/')->with('data', "ไม่พบข้อมูล");
                }

//                } else {
//
//                    $listRoom = $this->getListRoomcasebts_station($person_live, $price_low, $price_high, $station_bts);
//
//                    if ($listRoom == null || sizeof($listRoom) == 0 || count($listRoom) == 0) {
////                                return redirect()->back()->withErrors(['data' => $notfound]);
//                        return redirect('/')->with('data',"ไม่พบข้อมูล");
//                    }
//
//
//                    $pot_station_bts = $this->getBtsstationlist();
//                    foreach ($pot_station_bts as $bts) {
//                        $place_lat_away = $bts->lat;
//                        $place_lng_away = $bts->lng;
//
//                        $valresult_havecar = $this->havecar($listRoom, $place_lat_away, $place_lng_away);
//                    }
//                    $result = $valresult_havecar->sortBy('price');
//
//                    if ($result != null || $result != [] || sizeof($result) != 0 || $result != "" || is_array($result) || count($result) != 0) {
//                        return view('smartsearch', compact('result', 'stat_search_option', 'zone_bts', 'name_bts_select', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'optioncar', 'stat_search_option'));
//                    } else {
//                        return redirect('/')->with('data',"ไม่พบข้อมูล");
//                    }
//
//
//                }

                break;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
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
            ->join('user', 'user.id', '=', 'room.user_id')
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


        $RoomFullsetattr = $room->transform(function ($item, $key) use ($itemArr) {

//            foreach ($arrimgroom as $subItem) {
            $item->imgRoomF = $itemArr[$key];
//            }
            return $item;
        });

        return $RoomFullsetattr;

    }

    function getListRoomcasebts_station($personlive, $price_lower, $price_higher, $id_bts)
    {

        $room = DB::table('room')
            ->select('*', 'room.id AS roomid', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng','room.lat AS room_lat','room.lng AS room_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('user', 'user.id', '=', 'room.user_id')
            ->join('type_builder', 'type_builder.id', '=', 'room.type_builder')
            ->where('room.personLive', '=', '' . $personlive)
            ->whereBetween('room.price', [$price_lower, $price_higher])
//            ->orderBy('room.price', $chs_rangeprice)
            ->where('bts_station.id', '=', $id_bts)
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


        $RoomFullsetattr = $room->transform(function ($item, $key) use ($itemArr) {

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

        $result = $listroom->transform(function ($item, $key) use ($calRoute) {
            $item->time = $calRoute[$key][0];
            $item->distance = $calRoute[$key][1];

            return $item;
        });


        return $result;


    }


    function nothavecar($listroom)
    {

        $calRoute = [];
        foreach ($listroom as $room) {
            $place_lat_away = $room->room_lat;
            $place_lng_away = $room->room_lng;

//            echo $room->lat . "<br>" . $room->lng;
            array_push($calRoute, $this->calRouteAndTime($place_lat_away, $place_lng_away, $room->btsstation_lat, $room->btsstation_lng));
        }

//        dd($calRoute);
        $result = $listroom->transform(function ($item, $key) use ($calRoute) {
            $item->time = $calRoute[$key][0];
            $item->distance = $calRoute[$key][1];

            return $item;
        });
        return $result;
    }
    function nothavecarnearBts($listroom,$bts_lat,$bts_lng)
    {

        $calRoute = [];
        foreach ($listroom as $room) {
            $place_lat_away = $room->lat;
            $place_lng_away = $room->lng;

//            echo $room->lat . "<br>" . $room->lng;
            array_push($calRoute, $this->calRouteAndTime($place_lat_away, $place_lng_away, $bts_lat, $bts_lng));
        }

//        dd($calRoute);
        $result = $listroom->transform(function ($item, $key) use ($calRoute) {
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


    public
    function sorTval(Request $request)
    {
        $dataSearch = json_decode($request->dataAll, true);

        $sortDistance = $request->sortDistnce;
        $sortPrice = $request->sortPrice;

        $price_low = $request->price_low;
        $price_high = $request->price_high;
        $person_live = $request->person_live;
        $area_zone = $request->area_zone;
        $lifestyle_location = $request->lifestyleplace;
        $optioncar = $request->optioncar;
        $stat_search_option = $request->stat_search_option;


//        return $request;


        $zone_bts = [];
//dd($dataSearch);
        $collectio_data = collect($dataSearch);
//        dd($collectio_data);
//        $collectio_data = $dataSearch;

        $name_bts_select = "";
        if ($area_zone != null) {

            $name_bts_select = Btsstation::find($area_zone);
        }

        if ($sortPrice == "priceLow" && $sortDistance == "distaceAsc") {
            // $newsortdata = $collectio_data->sortBy('price')->sortBy('distance');
//            return ["case1" => json_decode(json_encode($newsortdata->reverse()->toArray()))];
            $newsortdata = $collectio_data->sortByDesc('price')->sortByDesc('distance');


        } else if ($sortPrice == "priceLow" && $sortDistance == "distaceDesc") {

            $newsortdata = $collectio_data->sortByDesc('price')->sortBy('distance');
//            return ["case2" => json_decode(json_encode($newsortdata->reverse()->toArray()))];

        } else if ($sortPrice == "priceHigh" && $sortDistance == "distaceAsc") {
            // $newsortdata = $collectio_data->sortByDesc('price')->sortBy('distance');
            $newsortdata = $collectio_data->sortBy('price')->sortByDesc('distance');

//            return ["case3" => json_decode(json_encode($newsortdata->reverse()->toArray()))];

        } else if ($sortPrice == "priceHigh" && $sortDistance == "distaceDesc") {
            // $newsortdata = $collectio_data->sortByDesc('price');
            $newsortdata = $collectio_data->sortByDesc('price')->sortBy('distance');

            // $newsortdata = $collectio_data->sortByDesc('price')->sortByDesc('distance');
//            return ["case4" => json_decode(json_encode($newsortdata->reverse()->toArray()))];

        }


        $arr_data_ = json_decode(json_encode($newsortdata->reverse()->toArray()));
//        $arr_data_sort = $newsortdata->values()->all();

//        return [$arr_data_sort,collect($arr_data_)];
//        dd($newsortdata);

        $result = collect($arr_data_);


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
//        return $result[1];

        if ($result) {
            return view('smartsearch', compact('result', 'zone_bts', 'name_bts_select', 'lifestyle_location', 'price_low', 'price_high', 'person_live', 'area_zone', 'optioncar', 'stat_search_option'));
        } else {
            return redirect('/')->with(['data' => "ไม่พบข้อมูล"]);
        }


    }

}

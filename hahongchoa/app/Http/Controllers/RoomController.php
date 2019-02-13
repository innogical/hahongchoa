<?php

namespace App\Http\Controllers;

use App\Adroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        return view('welcome');
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

        $listrooms = DB::table('room')
            ->select('*', 'bts_station.lat AS btsstation_lat', 'bts_station.lng AS btsstation_lng')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->join('imageRoom', 'imageRoom.roomid', '=', 'room.id')
            ->join('zone', 'zone.id', '=', 'room.zone_id')
            ->get();


        $zone = $this->Zonebts_near();

        return view('welcome', compact('listrooms', 'zone'));
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

//        return $search;
//        return json_decode($search,true);
        return response()->json($search);
    }


}

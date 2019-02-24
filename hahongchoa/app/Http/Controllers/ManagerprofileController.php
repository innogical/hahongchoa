<?php

namespace App\Http\Controllers;

use App\Adroom;
use App\Imageroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $myrooms = DB::table('room')
            ->select('*', 'room.id AS roomid')
            ->join('bts_station', 'bts_station.id', '=', 'room.btsstation_id')
            ->where('room.user_id', Auth::user()->id)
            ->orderBy('created_at','desc')
            ->get();

        $arr = [];
        foreach ($myrooms as $detailroom) {
            $listimg = $this->roomiMg($detailroom->roomid);
            array_push($arr, $listimg);
        }

        $itemArr = [];
        foreach ($arr as $index => $subItem) {
             array_push($itemArr,$subItem->pathimg);
        }

        $arrom = $myrooms->map(function ($item, $key) use ($itemArr) {

                $item->pathimg = $itemArr[$key];

            return $item;
        });


        $myrooms = $arrom;

//        dd($arrom);
        return view('managerroom', compact('myrooms'));
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
     * @param  \App\Imageroom $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Imageroom $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imageroom $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Imageroom $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Imageroom $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imageroom $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imageroom $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imageroom $profile)
    {
        //
    }

    function roomiMg($idroom)
    {
        $listimg = DB::table('imageRoom')
            ->where('roomid', '=', $idroom)
            ->groupBy('roomid')
            ->first();

        return $listimg;

    }
}

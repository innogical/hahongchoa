<?php

namespace App\Http\Controllers;

use App\Adroom;
use App\Facilitys;
use App\Imageroom;
use Carbon\Carbon;
use Faker\Provider\Image;
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
            ->join('type_builder', 'type_builder.id', '=', 'room.type_builder')
            ->where('room.user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();


        $arr = [];

        foreach ($myrooms as $detailroom) {
            $listimg = $this->roomiMg($detailroom->roomid);
            if ($listimg != null) {
                array_push($arr, $listimg);
            }
        }

//        return $arr;
//
//        $itemArr = [];
//        foreach ($arr as $index => $subItem) {
//            array_push($itemArr, $subItem->pathimg);
//        }


        $arrom = $myrooms->transform(function ($item, $key) use ($arr) {

//            echo  $arr[$key]->pathimg;
            $item->pathimg = $arr[$key]->pathimg;

            return $item;
        });

//        return "Sdad";


        $myrooms = $arrom;

//        dd($myrooms);
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
    public function edit($id)

    {
        $icon = ['cctv.svg', 'elavator.svg', 'fitness.svg', 'food.svg', 'furniture.svg', 'park.svg', 'pet.svg', 'swim.svg', 'washing.svg', 'wifi.svg'];
//        $listzone = $this->Zonebts_near();
//        dd($listzone);
        $lifestyle = ['นักศึกษา', 'บุคคลทั่วไป'];

        $promise = ['3เดือน', '6เดือน', '1ปี'];
        $namefacility = ['CCTV', 'ลิฟต์', 'ฟิตเนส', 'ร้านอาหาร', 'เฟอร์นิเจอร์', 'จอดรถ', 'เลี้ยงสัตว์', 'สระว่ายนํ้า', 'ซักผ้า', 'Internet'];
        $myRoom = Adroom::find($id);
        $image_ofroom = Imageroom::where('roomid', '=', $myRoom->id)->get();
        $facility_ofRoom = DB::table('room_facility')
            ->where('room_id', '=', $myRoom->id)->get();
        $bts = DB::table('bts_station')->get();

//        dd($facility_ofRoom);


        foreach ($image_ofroom as $key => $iamge) {

            $filename = $iamge->pathimg;
            $obj['name'] = $filename; //get the filename in array
            $obj['size'] = filesize("images_rooms/" . $filename); //get the flesize in array
            $obj['dataURI'] = 'data:image/jpg;base64,' . base64_encode(file_get_contents("images_rooms/" . $filename));//get the flesize in array
            $image_ofroom_toResult[] = $obj; // copy it to another array
        }


//        return $myRoom;


        return view('edit_room', compact('icon', 'namefacility', 'bts', 'myRoom', 'lifestyle', 'promise', 'image_ofroom_toResult', 'facility_ofRoom'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Imageroom $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $idroom = $request->idroom;
        $namecondo = $request->namecondo;
        $address = $request->address;
        $zonearea = $request->zonearea;
        $lifestyle = $request->lifestyle;
        $promise = $request->promise;
        $hilight = $request->hilight;
        $detail = $request->detail;
        $sizeroom = $request->sizeroom;
        $price = $request->price;
        $amoutLife = $request->amoutLife;
        $options_facility_edit = $request->options_facility_edit;
        $lat = $request->lat;
        $lng = $request->lng;
        $facility = json_decode($request->facility);
        $file = $request->file;

//
//        $Editroom = Adroom::find($idroom);
//        $Editroom->stylelife_id = $lifestyle;
//        $Editroom->name = $namecondo;
//        $Editroom->address = $address;
//        $Editroom->lease_id = $promise;
//        $Editroom->btsstation_id = $zonearea;
//        $Editroom->zone_id = $zonearea;
//        $Editroom->size = $sizeroom;
//        $Editroom->personLive =
//        $Editroom->lat = $lat
//        $Editroom->lng = $lng;
//        $Editroom->detail = $detail
//        $Editroom->hilight = $hilight;
//        $Editroom->price = $price;


        Imageroom::where('roomid', '=', $idroom)->delete();

//       $listimgs->destroy();
//
//        foreach ($imageRoom as $img){
//            $img->delete();
//        }

        foreach ($file as $a_file) {
            $addnewImage = new Imageroom();
            $addnewImage->roomid = $idroom;
            $name_image = Carbon::now()->min() . $a_file->getClientOriginalName();
            $addnewImage->pathimg = $name_image;
            $a_file->move(public_path() . '/images_rooms/', $name_image);
            $addnewImage->save();

        }

        return redirect('/manager');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imageroom $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adroom::destroy($id);

        return redirect()->back();

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

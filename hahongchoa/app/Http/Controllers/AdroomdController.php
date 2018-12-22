<?php

namespace App\Http\Controllers;

use App\Adroom;
use App\Imageroom;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdroomdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listzone = ['สวนสาธารณะ', 'แหล่งต่างชาติ', 'ห้างสรรพสินค้า', 'แนวรถไฟฟ้า', 'ตลาดนัดกลางคืน'];
        $lifestyle = ['นักศึกษา', 'บุคคลทั่วไป'];
        $promise = ['3เดือน', 'ุ6เดือน', '1ปี'];
        $bts = ['หมอชิต', 'สะพานควาย	', 'อารีย์', 'สนามเป้า', 'อนุสาวรีย์ชัยสมรภูมิ', 'พญาไท', 'ราชเทวี', 'สยาม', ' ชิดลม',
            'เพลินจิต', 'นานา', 'อโศก', 'พร้อมพงษ์', ' ทองหล่อ', 'เอกมัย', 'พระโขนง', ' อ่อนนุช', 'บางจาก', ' ปุณณวิถี', ' อุดมสุข', 'บางนา', 'แบริ่ง', 'สนามกีฬา', 'ราชดำริ', ' ศาลาแดง', 'ช่องนนทรี', 'สุรศักดิ์', 'สะพานตากสิน', 'กรุงธนบุรี', 'วงเวียนใหญ่', 'โพธิ์นิมิตร', 'ตลาดพลู', 'วุฒากาศ', 'บางหว้า', 'สำโรง'
        ];
        return view('createroom', compact('listzone', 'promise', 'bts', 'lifestyle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //

        $namecondo = $request->namecondo;
        $amoutroom = $request->amoutroom;
        $address = $request->address;
        $sizeroom = $request->sizeroom;
        $zonearea = $request->zonearea;
        $price = $request->price;
        $lifestyle = $request->lifestyle;
        $bts = $request->bts;
        $detail = $request->detail;
        $hilight = $request->hilight;

        $amoutLife = $request->amoutLife;
        $file_dropzzone = $request->file;

        $enagy = $request->enagy;
        $middle_val = $request->middle_val;
        $insurance = $request->insurance;
        $water = $request->water;
        $promise = $request->promise;
        $internet = $request->internet;
        $lat = $request->lat;
        $lng = $request->lng;
        $user_token = $request->user_token;
//

        $Addroom = new Adroom();
        $AddImageroom = new Imageroom();

        $Addroom->stylelife_id = $lifestyle;
        $Addroom->user_token = $user_token;
        $Addroom->name = $namecondo;
        $Addroom->address = $address;
        $Addroom->lease_id = $promise;
        $Addroom->btsstation_id = $bts;
        $Addroom->zone_id = $zonearea;
        $Addroom->size = $sizeroom;
        $Addroom->personLive = $amoutLife;
        $Addroom->lat = $lat;
        $Addroom->lng = $lng;
        $Addroom->detail = $detail;
        $Addroom->hilight = $hilight;

//
        foreach ($file_dropzzone as $key => $itemfile) {
            $item[$key] = $itemfile->getClientOriginalName();
        }

        if (count($item)) {

            foreach ($item as $key => $item_s) {
//            $str_val = $item_s;
//                echo $item_s . "<br>";
                $AddImageroom->pathimg = $item_s;
                $AddImageroom->save();
            }


        }
//
//        $loop_val_img = json_encode($item);
//        for ($i = 0; $i<= $loop_val_img; $i++){
//            echo $loop_val_img[$i];
//        }
//        return
//
//        if (count($item) > 1) {
//            $string_item = implode(',', $item);
//        }
//        $item_toconvert = $string_item;


        $Addroom->save();

//        dd($item);
//        return $item;
        return redirect('/managerroom')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adroom $adroom
     * @return \Illuminate\Http\Response
     */
    public
    function show(Adroom $adroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adroom $adroom
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Adroom $adroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Adroom $adroom
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Adroom $adroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adroom $adroom
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Adroom $adroom)
    {
        //
    }
}

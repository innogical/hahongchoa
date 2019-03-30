<?php

namespace App\Http\Controllers;

use App\Adroom;
use App\Facilitys;
use App\Imageroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManagerStatic;

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
        $lifestyle = ['นักศึกษา', 'บุคคลทั่วไป'];
        $promise = ['3เดือน', '6เดือน', '12เดือน'];
//        $bts = ['หมอชิต', 'สะพานควาย	', 'อารีย์', 'สนามเป้า', 'อนุสาวรีย์ชัยสมรภูมิ', 'พญาไท', 'ราชเทวี', 'สยาม', ' ชิดลม',
//            'เพลินจิต', 'นานา', 'อโศก', 'พร้อมพงษ์', ' ทองหล่อ', 'เอกมัย', 'พระโขนง', ' อ่อนนุช', 'บางจาก', ' ปุณณวิถี', ' อุดมสุข', 'บางนา', 'แบริ่ง', 'สนามกีฬา', 'ราชดำริ', ' ศาลาแดง', 'ช่องนนทรี', 'สุรศักดิ์', 'สะพานตากสิน', 'กรุงธนบุรี', 'วงเวียนใหญ่', 'โพธิ์นิมิตร', 'ตลาดพลู', 'วุฒากาศ', 'บางหว้า', 'สำโรง'
//        ];

        $bts = DB::table('bts_station')->get();



//        $icon = ['cctv.svg', 'elavator.svg', 'fitness.svg', 'food.svg', 'furniture.svg', 'park.svg', 'pet.svg', 'skytrian.svg', 'swim.svg', 'washing.svg', 'wifi.svg'];
        $icon = ['cctv.svg', 'elavator.svg', 'fitness.svg', 'food.svg', 'furniture.svg', 'park.svg', 'pet.svg', 'swim.svg', 'washing.svg', 'wifi.svg'];
//        $listzone = $this->Zonebts_near();
//        dd($listzone);

        $namefacility = ['CCTV', 'ลิฟต์', 'ฟิตเนส', 'ร้านอาหาร', 'เฟอร์นิเจอร์', 'จอดรถ', 'เลี้ยงสัตว์', 'สระว่ายนํ้า', 'เครื่องซักผ้า', 'Internet'];


        return view('createroom', compact('promise', 'bts', 'lifestyle', 'icon', 'namefacility', 'zone'));

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
    public
    function store(Request $request)
    {

//        return $request;


        $typebuild = $request->typebuild;
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
        $file_dropzzone[] = $request->file;
        $promise = $request->promise;
        $lat = $request->lat;
        $lng = $request->lng;
        $user_token = \Illuminate\Support\Facades\Auth::user()->id;
        $facilitys = $request->facility;


        $Addroom = new Adroom();

        $Addroom->stylelife_id = $lifestyle;
        $Addroom->user_id = $user_token;
        $Addroom->name = $namecondo;
        $Addroom->address = $address;
        $Addroom->lease_id = $promise;
        $Addroom->btsstation_id = $zonearea;
        $Addroom->zone_id = $zonearea;
        $Addroom->size = $sizeroom;
        $Addroom->personLive = $amoutLife;
        $Addroom->lat = $lat;
        $Addroom->lng = $lng;
        $Addroom->detail = $detail;
        $Addroom->hilight = $hilight;
        $Addroom->amoutroom = $amoutroom;
        $Addroom->type_builder = $typebuild;
        $Addroom->price = $price;
//
        $Addroom->save();


        $id = $Addroom->id;
//
        $data = [];
        foreach ($request->file as $image) {
            $timestamp = floor(microtime(true) * 1000);
//            $name = $timestamp . $image->getClientOriginalName();

            $new_name_random = $timestamp . $this->generateRandomString();
            $filename = $image->getClientOriginalName();
            $expolr = explode(".", $filename);
            $extension = end($expolr);
            $newfilename = $new_name_random . "." . $extension;


            //////// lib resize /////////
//
//            $img = ImageManagerStatic::make($image->getRealPath());
//            $img->resize(532, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $new_name_random =$timestamp. $this->generateRandomString();
//            $filename=$image->getClientOriginalName();
//            $expolr = explode(".", $filename);
//            $extension=end($expolr);
//            $newfilename=$new_name_random .".".$extension;
//            $img->save(realpath(base_path().'/../public_html/images_rooms')."/".$newfilename,100);
//            array_push($data,$newfilename);
//        }
//
//            //////// lib resize /////////
            $image->move(public_path() . '/images_rooms/', $newfilename);
            array_push($data, $newfilename);

//todo:: Resize เมื่องานทุกอย่างเสร็จแล้ว


        }


//        dd($data);
        foreach ($data as $nameimg) {
            // loop image room
            $AddImageroom = new Imageroom();
            $AddImageroom->roomId = $id;
            $AddImageroom->pathimg = $nameimg;
            $AddImageroom->save();

        }

        if ($facilitys != null || sizeof($facilitys) == 0 || $facilitys != [] || $facilitys == "") {

            $cutComma = rtrim($facilitys, ",");
            $FacilityExpolore = explode(",", $cutComma);
            foreach ($FacilityExpolore as $a_facitltiy) {
                $facility_model = new Facilitys();
                $facility_model->room_id = $id;
                $facility_model->facility_id = $a_facitltiy;
                $facility_model->save();

            }
        }

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
    function edit($id)
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


//        return $bts;


        foreach ($image_ofroom as $key => $iamge) {

            $filename = $iamge->pathimg;
            $obj['name'] = $filename; //get the filename in array
            $obj['size'] = filesize("images_rooms/" . $filename); //get the flesize in array
            $obj['dataURI'] = 'data:image/jpg;base64,' . base64_encode(file_get_contents("images_rooms/" . $filename));//get the flesize in array
            $image_ofroom_toResult[] = $obj; // copy it to another array
        }


//        return $myRoom;


        return view('edit_room', compact('icon', 'namefacility', 'myRoom', 'bts', 'lifestyle', 'promise', 'image_ofroom_toResult', 'facility_ofRoom'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Adroom $adroom
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request)
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


        $Editroom = Adroom::find($idroom);
        $Editroom->stylelife_id = $lifestyle;
        $Editroom->name = $namecondo;
        $Editroom->address = $address;
        $Editroom->lease_id = $promise;
        $Editroom->btsstation_id = $zonearea;
        $Editroom->zone_id = $zonearea;
        $Editroom->size = $sizeroom;
        $Editroom->personLive = $amoutLife;
        $Editroom->lat = $lat;
        $Editroom->lng = $lng;
        $Editroom->detail = $detail;
        $Editroom->hilight = $hilight;
        $Editroom->price = $price;

//        $Editroom->save();


        Imageroom::where('roomid', '=', $idroom)->delete();

//       $listimgs->destroy();
//
//        foreach ($imageRoom as $img){
//            $img->delete();
//        }

//        return $facility;


        if ($facility != null || sizeof($facility) == 0 || $facility != [] || $facility == "") {

            foreach ($facility as $a_facitltiy) {
                $facility_model = new Facilitys();
                $facility_model->room_id = $idroom;
                $facility_model->facility_id = $a_facitltiy;
//                $facility_model->save();

            }
        }

        foreach ($file as $a_file) {
            $addnewImage = new Imageroom();
            $addnewImage->roomid = $idroom;
            $timestamp = floor(microtime(true) * 1000);

            $img = ImageManagerStatic::make($a_file->getRealPath());

//            echo $img->filesize()."<br>";
            $filename = $a_file->getClientOriginalName();

            if ($img->filesize() > 2000000) {

            } else {
                $img->resize(532, null, function ($constraint) {
                    $constraint->aspectRatio();
                });


                $new_name_random = $timestamp . $this->generateRandomString();

                $expolr = explode(".", $filename);
                $extension = end($expolr);
                $newfilename = $new_name_random . "." . $extension;

                $addnewImage->pathimg = $newfilename;
                $addnewImage->save();
                $img->save(public_path() . '/images_rooms' . "/" . $newfilename, 100);
            }
        }

//        return "s";

//            $a_file->move(public_path() . '/images_rooms/', $name_image);

//
//            $img = ImageManagerStatic::make($a_file->getRealPath());
//// now you are able to resize the instance
//            $img->resize(532, 370);
//// finally we save the image as a new file
//            $img->save(public_path() . '/images_rooms/' . $name_image);


//            $image_resize = Image::make($a_file->getRealPath());
//            $image_resize->resize(300, 300);
//            $image_resize->save(public_path('/images_rooms/' .$name_image));
//
//            $addnewImage->save();


//            $imae = $this->resize_image(public_path() . '/images_rooms/', $name_image, 532, 200);

        // $img_tomove = this->resize_image(public_path() . '/images_rooms/', $name_image, 532, 200);
//            $a_file->move(public_path() . '/images_rooms/', $name_image);


        return redirect('/managerroom');
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

    function Zonebts_near()
    {

        $bts_lists = DB::table('zone')->get();
        return $bts_lists;


    }


    function generateRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

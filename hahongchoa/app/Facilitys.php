<?php
/**
 * Created by PhpStorm.
 * User: innovate
 * Date: 2019-01-06
 * Time: 17:13
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Facilitys extends Model
{
    public $table = "room_facility";
    public $primaryKey = "id";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'room_id',
        'facility_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}
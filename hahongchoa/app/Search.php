<?php
/**
 * Created by PhpStorm.
 * User: innovate
 * Date: 2019-01-06
 * Time: 17:13
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public $table = "searchlocation";
    public $primaryKey = "id";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'namelocation',
        'type',
        'lat',
        'lng'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}
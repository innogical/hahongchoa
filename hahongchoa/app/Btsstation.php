<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Btsstation extends Model
{
    //
    public $table = "bts_station";
    public $primaryKey = "id";

    protected $fillable = [
        'name_station',
        'lat',
        'lng'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}

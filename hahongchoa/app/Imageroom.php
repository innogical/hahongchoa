<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageroom extends Model
{
    //
    public $table = "imageRoom";
    public $primaryKey = "img_id";

    protected $fillable = [
        'roomid',
        'pathimg'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}

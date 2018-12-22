<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adroom extends Model
{
    public $table = "room";
    public $primaryKey = "id";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'stylelife_id',
        'user_token',
        'name',
        'address',
        'lease_id',
        'btsstation_id',
        'zone_id',
        'size',
        'personLive',
        'lat',
        'lng',
        'detail',
        'hilight'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}

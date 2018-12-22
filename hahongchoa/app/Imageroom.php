<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageroom extends Model
{
    //
    public $table = "imageRoom";
    public $primaryKey = "roomId";

    protected $fillable = [
        'pathimg'
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

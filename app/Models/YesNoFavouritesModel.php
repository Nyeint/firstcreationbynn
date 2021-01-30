<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YesNoFavouritesModel extends Model
{
    protected $table="yesno_favourites";
    public $timestamps=false;

    protected $fillable=[
        'id',
        'data',
        'name'
    ];
}

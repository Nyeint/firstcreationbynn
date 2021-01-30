<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectFavouritesModel extends Model
{
    protected $table="select_favourites";
    public $timestamps=false;
    public $incrementing = false;


    protected $fillable=[
        'id',
        'fashion',
        'hobby',
        'movie',
        'music'
    ];

    // public function register(){
    //     return $this->belongsTo('App\Models\RegisterModel');
    // }
}

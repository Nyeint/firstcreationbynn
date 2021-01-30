<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table="firstcreation";
    public $timestamps=false;
    public $incrementing = false;

    protected $fillable=[
        'id',
        'name',
        'birthday',
        'gender',
        'region',
        'city',
        'occupation',
        'maritalStatus',
        'height',
        'weight',
        'skinColor',
        'email',
        'password' ,
        'picture' 
    ];
    public function selectFav(){
        return $this->hasOne('App\Models\SelectFavouritesModel','id');
    }
}

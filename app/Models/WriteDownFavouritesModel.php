<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WriteDownFavouritesModel extends Model
{
    protected $table="writedown_favourites";
    public $timestamps=false;

    protected $fillable=[
        'id',
        'actor',
        'movie',
        'singer',
        'song',
        'animal',
        'book_author',
        'book_title',
        'place_to_travel'
    ];
}

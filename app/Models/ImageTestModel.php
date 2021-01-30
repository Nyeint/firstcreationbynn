<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageTestModel extends Model
{
    protected $table="image_test";
    public $timestamps=false;

    protected $fillable=[
        'name',
        'image'
    ];
}

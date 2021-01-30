<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountMemoryModel extends Model
{
    protected $table="account_memory";
    public $timestamps=false;
    public $incrementing = false;

    protected $fillable=[
        'id',
        'login',
        'language'
    ];

}

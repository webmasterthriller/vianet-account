<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user','garant','gender', 'name','surname','address',
        'post_code','city', 'country','phone','signed_at','granted',];

    protected $casts = ['signed_at'=>'datetime',];
}

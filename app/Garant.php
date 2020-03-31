<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garant extends Model
{
    protected $fillable = ['user', 'gender', 'name', 'surname',
        'address', 'post_code','city','country','phone','grant',];

    protected $casts = ['registered_at' =>'datetime',];
}

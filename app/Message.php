<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from_user','to_user','subject','content','send_at','read','read_at',];

    protected $casts = ['send_at'=>'dateTime','read_at'=>'dateTime',];
}

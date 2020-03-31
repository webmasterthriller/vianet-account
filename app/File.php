<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['path','attach_message','upload_at',];

    protected $casts = ['upload_at'=>'dateTime',];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['type','amount','owner_client',];

    protected $casts = ['complete_at'=>'datetime',];
}

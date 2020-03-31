<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
      'init_garant','init_at','type','libelle','taxe','done','by_client','done_at',
    ];

    protected $casts = [
        'init_at','done_at',
    ];
}

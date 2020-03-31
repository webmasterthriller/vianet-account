<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rib extends Model
{
    protected $fillable = ['bank_provider', 'iban', 'swift',];

    protected $hidden = ['login_name', 'login_pwd',];
}

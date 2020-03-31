<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['client', 'balance', 'credit', 'debit', 'post_code',];

    protected $casts = ['created_at' =>'datetime',];
}

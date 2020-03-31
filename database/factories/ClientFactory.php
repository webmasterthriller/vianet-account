<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'user',
        'garant',
        'gender',
        'name',
        'surname',
        'address',
        'post_code',
        'city',
        'country',
        'phone',
        'signed_at',
        'granted',
    ];
});

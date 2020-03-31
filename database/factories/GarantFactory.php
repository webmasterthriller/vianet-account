<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Garant;
use Faker\Generator as Faker;

$factory->define(Garant::class, function (Faker $faker) {
    return [
        'user',
        'gender',
        'name',
        'surname',
        'address',
        'post_code',
        'city',
        'country',
        'phone',
        'grant',
        'registered_at',
    ];
});

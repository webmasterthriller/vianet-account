<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rib;
use Faker\Generator as Faker;

$factory->define(Rib::class, function (Faker $faker) {
    return [
        'bank_provider',
        'iban',
        'swift',
        'login_name',
        'login_pwd',
    ];
});

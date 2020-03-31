<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'client'=>$faker->numberBetween(100001,199999),
        'balance'=>$faker->numberBetween(2000,250000),
    ];
});

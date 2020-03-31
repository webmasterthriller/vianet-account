<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Operation;
use Faker\Generator as Faker;

$factory->define(Operation::class, function (Faker $faker) {
    return [
        'init_garant',
        'init_at',
        'type',
        'libelle',
        'taxe',
        'done',
        'by_client',
        'done_at',
    ];
});

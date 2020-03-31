<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'from_user',
        'to_user',
        'subject',
        'content',
        'send_at',
        'read',
        'read_at',
    ];
});

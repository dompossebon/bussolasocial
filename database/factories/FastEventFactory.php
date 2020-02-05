<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\FastEvent::class, function (Faker $faker) {
    return [
        'title' => 'Mergulhadores',
        'start' => '11:30:00',
        'end' => '13:00:00',
        'color' => '#e8f516',
        'manager' => 'Possebon',
    ];
});

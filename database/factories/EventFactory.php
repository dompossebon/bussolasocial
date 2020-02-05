<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Event::class, function (Faker $faker) {
    return [
        'fast_events_id' => 1,
        'title' => 'Mergulhadores',
        'start' => '2020-02-10 13:30:00',
        'end' => '2020-02-10 15:30:00',
        'color' => '#e8f516',
        'description' => 'Falar com Alunos',
        'status' => '0',
        'manager' => 'Possebon'
    ];
});

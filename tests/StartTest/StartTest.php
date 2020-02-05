<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class StartTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testStartDb()
    {

//        dd('aqui');
        $exitCode = Artisan::call('db:seed', [
            '--class' => 'FastEventTableSeeder'
        ]);
        $exitCode = Artisan::call('db:seed', [
            '--class' => 'EventTableSeeder'
        ]);

        $this->assertDatabaseHas('fast_events', [
            'title' => 'TurmaDoPossebon-I'
        ]);

        $this->assertDatabaseHas('events', [
            'title' => 'TurmaDoPossebon-I'
        ]);


    }
}

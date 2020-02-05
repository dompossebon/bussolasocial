<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class EndTest extends TestCase
{
    public function testEndDb()
    {

//        dd('aqui');
        $exitCode = Artisan::call('migrate:fresh');

        $this->assertDatabaseMissing('fast_events', [
            'title' => 'Abelhinha'
        ]);

        $this->assertDatabaseMissing('events', [
            'title' => 'Abelhinha'
        ]);


    }
}

<?php

namespace Tests\Unit;

use App\FastEvent;
use PHPUnit\Framework\TestCase;

class EventControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testViewRegistrationForm()
    {

        $s=new FastEvent();
        $students=$s->getStudents("Bob","");
        $this->assertIsArray($students);

        $this->assertTrue(true);
        $this->assertNotEmpty($fullDetails());
    }
}

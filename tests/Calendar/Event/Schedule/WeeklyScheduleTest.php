<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\BasicEvent;

class WeeklyScheduleTest extends \PHPUnit_Framework_TestCase
{
    public function testBasic()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('now'), new \DateTime('tomorrow'));
        $event->repeats()->weekly()->forever();

        $this->assertEquals('Weekly, on ' . date('l'), $event->getSchedule()->getSummary());
    }

    public function testEvery2Weeks()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('now'), new \DateTime('tomorrow'));
        $event->repeats()->weekly()->every(2)->forever();

        $this->assertEquals('Every 2 weeks, on ' . date('l'), $event->getSchedule()->getSummary());
    }
}

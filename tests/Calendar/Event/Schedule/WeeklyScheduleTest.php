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
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('today'), new \DateTime('tomorrow'));
        $event->repeats()->weekly()->forever();

        $this->assertEquals('Weekly, on ' . date('l'), $event->getSchedule()->getSummary());
        $this->assertEquals(new \DateTime('next ' . date('l')), $event->getSchedule()->nextOccurrence(new \DateTime('today')));
    }

    public function testEvery2Weeks()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('today'), new \DateTime('tomorrow'));
        $event->repeats()->weekly()->every(2)->endsOn(new \DateTime('2015-12-31'));

        $this->assertEquals('Every 2 weeks, on ' . date('l') . ', until Dec 31, 2015', $event->getSchedule()->getSummary());
        $this->assertEquals(new \DateTime('+2 weeks midnight'), $event->getSchedule()->nextOccurrence(new \DateTime('today')));
    }

    public function testWithOn()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('2015-08-07'), new \DateTime('2015-08-07 23:59:59'));
        $event->repeats()->weekly()->on('Tuesday', 'Thursday')->forever();

        $this->assertEquals('Weekly, on Tuesday, Thursday', $event->getSchedule()->getSummary());
        $this->assertEquals(new \DateTime('2015-08-11'), $event->getSchedule()->nextOccurrence(new \DateTime('2015-04-07')));
        $this->assertEquals(new \DateTime('2015-08-13'), $event->getSchedule()->nextOccurrence(new \DateTime('2015-08-11')));
    }
}

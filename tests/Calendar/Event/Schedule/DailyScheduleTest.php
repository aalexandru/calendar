<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\BasicEvent;

class DailyScheduleTest extends \PHPUnit_Framework_TestCase
{
    public function testEndsOnSpecificDate()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('2015-01-01 00:00:00'), new \DateTime('2015-01-01 23:59:59'));
        $event->repeats()->daily()->every(2)->endsOn(new \DateTime('2015-01-20'));

        $this->assertEquals('Every 2 days, until Jan 20, 2015', $event->getSchedule()->getSummary());
        $this->assertEquals(new \DateTime('2015-01-03'), $event->getSchedule()->nextOccurrence(new \DateTime('2015-01-01')));
        $this->assertFalse($event->getSchedule()->nextOccurrence(new \DateTime('2015-01-19')));
    }

    public function testEndAfterOccurrences()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('2015-01-01 00:00:00'), new \DateTime('2015-01-01 23:59:59'));
        $event->repeats()->daily()->endsAfter(5);

        $this->assertEquals('Daily, 5 times', $event->getSchedule()->getSummary());
        $this->assertEquals(new \DateTime('2015-01-04'), $event->getSchedule()->nextOccurrence(new \DateTime('2015-01-03')));
        $this->assertFalse($event->getSchedule()->nextOccurrence(new \DateTime('2015-01-06')));
    }

    public function testNeverEnds()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('2015-01-01 00:00:00'), new \DateTime('2015-01-01 23:59:59'));
        $event->repeats()->daily()->every(3)->forever();

        $this->assertEquals('Every 3 days', $event->getSchedule()->getSummary());
        $this->assertEquals(new \DateTime('2015-01-04'), $event->getSchedule()->nextOccurrence(new \DateTime('2015-01-01')));
        $this->assertEquals(new \DateTime('2016-01-02'), $event->getSchedule()->nextOccurrence(new \DateTime('2016-01-01')));
    }
}

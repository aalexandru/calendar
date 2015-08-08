<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event;

use Calendar\Calendar;

class BasicEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateRecurringEvent()
    {
        $event = new BasicEvent('My Event', 'Testing the new calendar', new \DateTime('now'), new \DateTime('tomorrow'));
        $event->repeats()->daily()->every(2)->endsOn(new \DateTime('2015-12-31'));

        $this->assertEquals('Every 2 days, until Dec 31, 2015', $event->getRepeat()->getSummary());

        $calendar = new Calendar('test');
        $calendar->add($event);
    }
}

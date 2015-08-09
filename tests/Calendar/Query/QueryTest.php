<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Query;

use Calendar\Calendar;
use Calendar\Event\AbstractEvent;
use Calendar\Event\BasicEvent;

class QueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var AbstractEvent[]
     */
    private $events;

    public function setUp()
    {
        $this->calendar = new Calendar('test');

        $event = new BasicEvent('My First Event', 'Testing the new calendar', new \DateTime('2015-03-05 00:00:00'), new \DateTime('2015-03-05 23:59:59'));
        $event->repeats()->daily()->every(2)->forever();
        $this->calendar->add($event);
        $this->events[] = $event;

        $event = new BasicEvent('My Second Event', 'Testing the new calendar', new \DateTime('2015-07-15 00:00:00'), new \DateTime('2015-07-15 23:59:59'));
        $event->repeats()->weekly()->endsAfter(2);
        $this->calendar->add($event);
        $this->events[] = $event;

        $event = new BasicEvent('My Third Event', 'Testing the new calendar', new \DateTime('2015-07-15 00:00:00'), new \DateTime('2015-07-15 23:59:59'));
        $event->repeats()->monthly()->endsOn(new \DateTime('2015-06-01'));
        $this->calendar->add($event);
        $this->events[] = $event;
    }

    public function testQueryNoResults()
    {
        $query = new Query(new \DateTime('2014-03-01'), new \DateTime('2015-01-15'));
        $results = $query->run($this->calendar);

        $this->assertEmpty($results);
    }

    public function testQueryOneResult()
    {
        $query = new Query(new \DateTime('2015-03-08 00:00:00'), new \DateTime('2015-03-11 23:59:59'));
        $results = $query->run($this->calendar);

        $this->assertSame($this->events[0], $results[0]);
    }

    public function testQueryMultipleResults()
    {
        $query = new Query(new \DateTime('2015-01-01'), new \DateTime('2015-12-31'));
        $results = $query->run($this->calendar);

        $this->assertSame($this->events, $results);
    }
}

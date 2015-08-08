<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar;

use Calendar\Event\AbstractEvent;
use Calendar\TemporalExpression\Day;

/**
 * Class Calendar
 *
 * @package Calendar
 */
class Calendar
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var AbstractEvent[]
     */
    protected $events;

    /**
     * Calendar constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param AbstractEvent $event
     */
    public function add(AbstractEvent $event)
    {
        $this->events[] = $event;
    }
}
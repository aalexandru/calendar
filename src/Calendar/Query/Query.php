<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Query;

use Calendar\Calendar;
use Calendar\Event\AbstractEvent;
use DateTime;

/**
 * Class Query
 *
 * @package Calendar\Query
 */
class Query
{
    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateTime
     */
    private $end;

    /**
     * Query constructor.
     *
     * @param DateTime $start
     * @param DateTime $end
     */
    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param Calendar $calendar
     * @return AbstractEvent[]
     */
    public function run(Calendar $calendar)
    {
        $start = $this->start;
        $end = $this->end;

        return array_filter($calendar->getEvents(), function(AbstractEvent $event) use($start, $end) {
            return $event->getFrom() >= $start
                && $event->getTo() <= $end
                || $event->isRecurring()
                && $event->getRepeat()->nextOccurrence($start) <= $end;
        });
    }
}
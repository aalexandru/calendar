<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Repeat\End;

use DateInterval;
use DateTime;

class AfterOccurrences extends AbstractEnd
{
    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateInterval
     */
    private $interval;
    /**
     * @var
     */
    private $occurrences;

    /**
     * AfterOccurrences constructor.
     *
     * @param int $occurrences
     * @param DateTime $start
     * @param DateInterval $interval
     */
    public function __construct($occurrences, DateTime $start, DateInterval $interval)
    {
        $this->occurrences = $occurrences;
        $this->start = $start;
        $this->interval = $interval;
    }

    /**
     * @param DateTime $date
     * @return bool
     */
    public function includes(DateTime $date)
    {
        // TODO: Implement includes() method.
    }
}
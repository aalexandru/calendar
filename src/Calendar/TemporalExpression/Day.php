<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\TemporalExpression;

class Day
{
    const Sunday = 0;
    const Monday = 1;
    const Tuesday = 2;
    const Wednesday = 3;
    const Thursday = 4;
    const Friday = 5;
    const Saturday = 6;

    /**
     * @var int
     */
    private $day;

    /**
     * Day constructor.
     *
     * @param int $day
     */
    public function __construct($day)
    {
        $this->day = $day;
    }
}
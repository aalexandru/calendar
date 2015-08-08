<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Repeat\End;

use DateTime;

class SpecificDate extends AbstractEnd
{
    /**
     * @var DateTime
     */
    private $date;

    /**
     * SpecificDate constructor.
     *
     * @param DateTime $date
     */
    public function __construct(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @param DateTime $date
     * @return bool
     */
    public function includes(DateTime $date)
    {
        return $this->date == $date;
    }
}
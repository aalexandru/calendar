<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Repeat\End;

use DateTime;

class Never extends AbstractEnd
{
    /**
     * @param DateTime $date
     * @return bool
     */
    public function includes(DateTime $date)
    {
        return false;
    }
}
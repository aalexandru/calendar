<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule\Endpoint;

use DateTime;

/**
 * Class Forever
 *
 * @package Calendar\Event\Schedule\Endpoint
 */
class Forever extends AbstractEndpoint
{
    /**
     * @param DateTime $date
     * @return bool
     */
    public function includes(DateTime $date)
    {
        return $this->repeat->getFrom() <= $date;
    }
}
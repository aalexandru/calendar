<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule\Endpoint;

use Calendar\Event\Schedule\AbstractSchedule;
use DateTime;

/**
 * Class SpecificDate
 *
 * @package Calendar\Event\Schedule\Endpoint
 */
class SpecificDate extends AbstractEndpoint
{
    /**
     * @var DateTime
     */
    private $date;

    /**
     * AfterOccurrences constructor.
     *
     * @param AbstractSchedule $repeat
     * @param DateTime $date
     */
    public function __construct(AbstractSchedule $repeat, DateTime $date)
    {
        parent::__construct($repeat);

        $this->date = $date;
    }

    /**
     * @param DateTime $date
     * @return bool
     */
    public function includes(DateTime $date)
    {
        return $this->repeat->getFrom() <= $date
            && $date <= $this->date;
    }
}
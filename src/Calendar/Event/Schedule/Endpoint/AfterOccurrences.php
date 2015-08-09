<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule\Endpoint;

use Calendar\Event\Schedule\AbstractSchedule;
use DateTime;

/**
 * Class AfterOccurrences
 *
 * @package Calendar\Event\Schedule\Endpoint
 */
class AfterOccurrences extends AbstractEndpoint
{
    /**
     * @var int
     */
    private $occurrences;

    /**
     * AfterOccurrences constructor.
     *
     * @param AbstractSchedule $repeat
     * @param int $occurrences
     */
    public function __construct(AbstractSchedule $repeat, $occurrences)
    {
        parent::__construct($repeat);

        $this->occurrences = $occurrences;
    }

    /**
     * @param DateTime $date
     * @return bool
     */
    public function includes(DateTime $date)
    {
        $clone = clone $this->repeat->getFrom();

        for ($i = 0; $i < $this->occurrences; $i++) {
            $clone->add($this->repeat->getInterval());
        }

        return $this->repeat->getFrom() <= $date
            && $date <= $clone;
    }
}
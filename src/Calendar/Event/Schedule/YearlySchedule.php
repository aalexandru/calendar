<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\AbstractEvent;
use DateInterval;

/**
 * Class YearlySchedule
 *
 * @package Calendar\Event\Schedule
 */
class YearlySchedule extends AbstractSchedule
{
    /**
     * AbstractRepeat constructor.
     *
     * @param AbstractEvent $event
     */
    public function __construct(AbstractEvent $event)
    {
        parent::__construct($event);

        $this->interval = DateInterval::createFromDateString('1 year');

        $this->summary = 'Yearly';
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function every($amount)
    {
        if ($amount <= 1) {
            return $this;
        }

        $this->interval = DateInterval::createFromDateString("{$amount} years");

        $this->summary = "Every {$amount} years";

        return $this;
    }
}

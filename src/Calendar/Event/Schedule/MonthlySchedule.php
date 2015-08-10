<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\AbstractEvent;
use DateInterval;

/**
 * Class MonthlySchedule
 *
 * @package Calendar\Event\Schedule
 */
class MonthlySchedule extends AbstractSchedule
{
    /**
     * AbstractRepeat constructor.
     *
     * @param AbstractEvent $event
     */
    public function __construct(AbstractEvent $event)
    {
        parent::__construct($event);

        $this->interval = DateInterval::createFromDateString('1 month');

        $this->summary = 'Monthly';
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

        $this->interval = DateInterval::createFromDateString("{$amount} months");

        $this->summary = "Every {$amount} months";

        return $this;
    }
}

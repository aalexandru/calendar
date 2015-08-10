<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\AbstractEvent;
use DateInterval;

/**
 * Class DailySchedule
 *
 * @package Calendar\Event\Schedule
 */
class DailySchedule extends AbstractSchedule
{
    /**
     * AbstractRepeat constructor.
     *
     * @param AbstractEvent $event
     */
    public function __construct(AbstractEvent $event)
    {
        parent::__construct($event);

        $this->interval = DateInterval::createFromDateString('1 day');

        $this->summary = 'Daily';
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

        $this->interval = DateInterval::createFromDateString("{$amount} days");

        $this->summary = "Every {$amount} days";

        return $this;
    }
}

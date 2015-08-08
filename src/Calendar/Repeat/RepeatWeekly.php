<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Repeat;

use Calendar\Event\AbstractEvent;
use Calendar\Repeat\End\AbstractEnd;
use Calendar\TemporalExpression\Day;
use DateInterval;
use DateTime;

/**
 * Class RepeatWeekly
 *
 * @package Calendar\Repeat
 */
class RepeatWeekly extends AbstractRepeat
{
    /**
     * @var Day[]
     */
    private $days;

    /**
     * AbstractRepeat constructor.
     *
     * @param AbstractEvent $event
     */
    public function __construct(AbstractEvent $event)
    {
        parent::__construct($event);

        $this->interval = DateInterval::createFromDateString('1 week');

        $this->summary = 'Weekly';
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

        $this->interval = DateInterval::createFromDateString("{$amount} weeks");

        $this->summary = "Every {$amount} weeks";

        return $this;
    }

    /**
     * @param Day[] $days
     * @return $this
     */
    public function on($days)
    {
        $this->days = array_unique($days);

        sort($this->days);

        $this->summary .= ', on ' . implode(', ', $this->days);

        return $this;
    }
}
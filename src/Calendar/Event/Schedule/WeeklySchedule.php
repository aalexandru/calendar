<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\AbstractEvent;
use Calendar\TemporalExpression\Day;
use DateInterval;
use DateTime;

/**
 * Class RepeatWeekly
 *
 * @package Calendar\Event\Schedule
 */
class WeeklySchedule extends AbstractSchedule
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

        $this->days = [new Day($this->from->format('l'))];

        $this->summary = 'Weekly';

        $this->addOnSummary();
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

        $this->addOnSummary();

        return $this;
    }

    /**
     * @param Day[] $days
     * @return $this
     */
    public function on(...$days)
    {
        $this->days = array_map(function ($day) {
            return new Day($day);
        }, array_unique($days));

        sort($this->days);

        $this->addOnSummary();

        return $this;
    }

    /**
     * @param DateTime $date
     * @return bool|DateTime
     */
    public function nextOccurrence(DateTime $date)
    {
        if ($date < $this->from) {
            return $this->nextOccurrence($this->from);
        }

        $current = clone $this->from;
        $current->modify('-' . $this->from->format('w') . ' day');

        $dateStartOfWeek = clone $date;
        $dateStartOfWeek->modify('-' . $date->format('w') . ' day');

        while ($current->add($this->interval) < $dateStartOfWeek);

        $current = min(array_filter(array_map(function (Day $day) use ($current) {
            $clone = clone $current;
            return $clone->modify('+' . $day->getDay() . ' day');
        }, $this->days), function ($item) use ($date) {
            return $item > $date;
        }));

        if ($this->to->includes($current)) {
            return $current;
        }

        return false;
    }

    /**
     * @return void
     */
    private function addOnSummary()
    {
        if (($on = strpos($this->summary, ', on')) !== false) {
            $this->summary = substr($this->summary, 0, $on);
        }

        $this->summary .= ', on ' . implode(', ', $this->days);
    }

}

<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\AbstractEvent;
use Calendar\TemporalExpression\Day;
use DateInterval;

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

        $this->days = [new Day($this->from->format('w'))];

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
    public function on($days)
    {
        $this->days = array_unique($days);

        sort($this->days);

        $this->addOnSummary();

        return $this;
    }

    /**
     * @return void
     */
    private function addOnSummary()
    {
        if (($on = strpos($this->summary, ', on')) != false) {
            $this->summary = substr($this->summary, 0, $on);
        }

        $this->summary .= ', on ' . implode(', ', array_map(function(Day $day) {
                return $day->getName();
            }, $this->days));
    }
}
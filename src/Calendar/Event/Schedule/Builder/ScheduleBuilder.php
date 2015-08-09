<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule\Builder;

use Calendar\Event\AbstractEvent;
use Calendar\Event\Schedule\DailySchedule;
use Calendar\Event\Schedule\MonthlySchedule;
use Calendar\Event\Schedule\WeeklySchedule;
use Calendar\Event\Schedule\YearlySchedule;

/**
 * Class ScheduleBuilder
 *
 * @package Calendar\Event\Schedule\Builder
 */
class ScheduleBuilder implements ScheduleBuilderInterface
{
    /**
     * @var AbstractEvent
     */
    private $event;

    /**
     * RepeatBuilder constructor.
     *
     * @param AbstractEvent $event
     */
    public function __construct(AbstractEvent $event)
    {
        $this->event = $event;
    }

    /**
     * @return DailySchedule
     */
    public function daily()
    {
        return new DailySchedule($this->event);
    }

    /**
     * @return WeeklySchedule
     */
    public function weekly()
    {
        return new WeeklySchedule($this->event);
    }

    /**
     * @return MonthlySchedule
     */
    public function monthly()
    {
        return new MonthlySchedule($this->event);
    }

    /**
     * @return YearlySchedule
     */
    public function yearly()
    {
        return new YearlySchedule($this->event);
    }
}
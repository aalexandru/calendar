<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule\Builder;

use Calendar\Event\Schedule\DailySchedule;
use Calendar\Event\Schedule\MonthlySchedule;
use Calendar\Event\Schedule\WeeklySchedule;
use Calendar\Event\Schedule\YearlySchedule;

/**
 * Interface RepeatBuilderInterface
 *
 * @package Calendar\Event\Schedule\Builder
 */
interface ScheduleBuilderInterface
{
    /**
     * @return DailySchedule
     */
    public function daily();

    /**
     * @return WeeklySchedule
     */
    public function weekly();

    /**
     * @return MonthlySchedule
     */
    public function monthly();

    /**
     * @return YearlySchedule
     */
    public function yearly();
}
<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Repeat\Builder;

use Calendar\Repeat\RepeatDaily;
use Calendar\Repeat\RepeatMonthly;
use Calendar\Repeat\RepeatWeekly;
use Calendar\Repeat\RepeatYearly;

/**
 * Interface RepeatBuilderInterface
 *
 * @package Calendar\Repeat\Builder
 */
interface RepeatBuilderInterface
{
    /**
     * @return RepeatDaily
     */
    public function daily();

    /**
     * @return RepeatWeekly
     */
    public function weekly();

    /**
     * @return RepeatMonthly
     */
    public function monthly();

    /**
     * @return RepeatYearly
     */
    public function yearly();
}
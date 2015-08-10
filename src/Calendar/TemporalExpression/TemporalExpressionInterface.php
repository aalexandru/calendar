<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\TemporalExpression;

use DateTime;

/**
 * Interface TemporalExpressionInterface
 *
 * @package Calendar\TemporalExpression
 */
interface TemporalExpressionInterface
{
    /**
     * @param DateTime $date
     * @return bool
     */
    public function includes(DateTime $date);
}

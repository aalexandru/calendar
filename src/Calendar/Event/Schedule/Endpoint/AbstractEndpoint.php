<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule\Endpoint;

use Calendar\Event\Schedule\AbstractSchedule;
use Calendar\TemporalExpression\TemporalExpressionInterface;

/**
 * Class AbstractEndpoint
 *
 * @package Calendar\Event\Schedule\Endpoint
 */
abstract class AbstractEndpoint implements TemporalExpressionInterface
{
    /**
     * @var AbstractSchedule
     */
    protected $repeat;

    /**
     * AbstractEnd constructor.
     *
     * @param AbstractSchedule $repeat
     */
    public function __construct(AbstractSchedule $repeat)
    {
        $this->repeat = $repeat;
    }
}
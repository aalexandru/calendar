<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Repeat\Builder;

use Calendar\Event\AbstractEvent;
use Calendar\Repeat\RepeatDaily;
use Calendar\Repeat\RepeatMonthly;
use Calendar\Repeat\RepeatWeekly;
use Calendar\Repeat\RepeatYearly;
use DateTime;

class RepeatBuilder implements RepeatBuilderInterface
{
    /**
     * @var DateTime
     */
    private $start;
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
     * @return RepeatDaily
     */
    public function daily()
    {
        return new RepeatDaily($this->event);
    }

    /**
     * @return RepeatWeekly
     */
    public function weekly()
    {
        return new RepeatWeekly($this->event);
    }

    /**
     * @return RepeatMonthly
     */
    public function monthly()
    {
        return new RepeatMonthly($this->event);
    }

    /**
     * @return RepeatYearly
     */
    public function yearly()
    {
        return new RepeatYearly($this->event);
    }
}
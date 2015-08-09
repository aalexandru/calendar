<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event;

use Calendar\Event\Schedule\AbstractSchedule;
use Calendar\Event\Schedule\Builder\ScheduleBuilder;
use Calendar\Event\Tag\Tag;
use DateTime;

/**
 * Class AbstractEvent
 *
 * @package Calendar\Event
 */
abstract class AbstractEvent
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var DateTime
     */
    protected $from;

    /**
     * @var DateTime
     */
    protected $to;

    /**
     * @var AbstractSchedule
     */
    protected $repeat;

    /**
     * @var Tag[]
     */
    protected $tags;

    /**
     * AbstractEvent constructor.
     *
     * @param string $title
     * @param string $description
     * @param DateTime $from
     * @param DateTime $to
     */
    public function __construct($title, $description, DateTime $from, DateTime $to)
    {
        $this->title = $title;
        $this->description = $description;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return ScheduleBuilder
     */
    public function repeats()
    {
        return new ScheduleBuilder($this);
    }

    /**
     * @param AbstractSchedule $repeat
     */
    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;
    }

    /**
     * @return AbstractSchedule
     */
    public function getRepeat()
    {
        return $this->repeat;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return DateTime
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isRecurring()
    {
        return isset($this->repeat);
    }
}
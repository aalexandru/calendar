<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event;

use Calendar\Repeat\AbstractRepeat;
use Calendar\Repeat\Builder\RepeatBuilder;
use Calendar\Tag\Tag;
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
     * @var AbstractRepeat
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
     * @return RepeatBuilder
     */
    public function repeats()
    {
        return new RepeatBuilder($this);
    }

    /**
     * @param AbstractRepeat $repeat
     */
    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;
    }

    /**
     * @return AbstractRepeat
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
     * @return \Calendar\Tag\Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }
}
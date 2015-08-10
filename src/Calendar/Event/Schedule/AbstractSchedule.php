<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Schedule;

use Calendar\Event\AbstractEvent;
use Calendar\Event\Schedule\Endpoint\AbstractEndpoint;
use Calendar\Event\Schedule\Endpoint\AfterOccurrences;
use Calendar\Event\Schedule\Endpoint\Forever;
use Calendar\Event\Schedule\Endpoint\SpecificDate;
use DateInterval;
use DateTime;

/**
 * Class AbstractRepeat
 *
 * @package Calendar\Event\Schedule
 */
abstract class AbstractSchedule
{
    /**
     * @var DateInterval
     */
    protected $interval;

    /**
     * @var DateTime
     */
    protected $from;

    /**
     * @var AbstractEndpoint
     */
    protected $to;

    /**
     * @var AbstractEvent
     */
    protected $event;

    /**
     * @var string
     */
    protected $summary;

    /**
     * AbstractRepeat constructor.
     *
     * @param AbstractEvent $event
     */
    public function __construct(AbstractEvent $event)
    {
        $this->event = $event;
        $this->from = $event->getFrom();
    }

    /**
     * @param $amount
     * @return $this
     */
    public abstract function every($amount);

    /**
     * @return $this
     */
    public function forever()
    {
        $this->to = new Forever($this);

        $this->event->setSchedule($this);
    }

    /**
     * @param int $occurrences
     * @return $this
     */
    public function endsAfter($occurrences)
    {
        $this->to = new AfterOccurrences($this, $occurrences);

        $this->summary .= ", {$occurrences} times";

        $this->event->setSchedule($this);
    }

    /**
     * @param DateTime $date
     * @return $this
     */
    public function endsOn(DateTime $date)
    {
        $this->to = new SpecificDate($this, $date);

        $this->summary .= ", until {$date->format('M j, Y')}";

        $this->event->setSchedule($this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->summary;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @return DateInterval
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @return DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return AbstractEndpoint
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return AbstractEvent
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param DateTime $date
     * @return bool|DateTime
     */
    public function nextOccurrence(DateTime $date)
    {
        if ($date < $this->from) {
            return $this->from;
        }

        $current = clone $this->from;
        while ($current->add($this->interval) <= $date);

        if ($this->to->includes($current)) {
            return $current;
        }

        return false;
    }
}
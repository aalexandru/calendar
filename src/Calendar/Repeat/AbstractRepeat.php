<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Repeat;

use Calendar\Event\AbstractEvent;
use Calendar\Repeat\End\AbstractEnd;
use Calendar\Repeat\End\AfterOccurrences;
use Calendar\Repeat\End\Never;
use Calendar\Repeat\End\SpecificDate;
use DateInterval;
use DateTime;

/**
 * Class AbstractRepeat
 *
 * @package Calendar\Repeat
 */
abstract class AbstractRepeat
{
    /**
     * @var DateInterval
     */
    protected $interval;

    /**
     * @var DateTime
     */
    protected $start;

    /**
     * @var AbstractEnd
     */
    protected $end;

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
        $this->end = new Never();

        $this->event->setRepeat($this);
    }

    /**
     * @param int $occurrences
     * @return $this
     */
    public function endsAfter($occurrences)
    {
        $this->end = new AfterOccurrences($occurrences, $this->event->getFrom(), $this->interval);

        $this->summary .= ", {$occurrences} times";

        $this->event->setRepeat($this);
    }

    /**
     * @param DateTime $date
     * @return $this
     */
    public function endsOn(DateTime $date)
    {
        $this->end = new SpecificDate($date);

        $this->summary .= ", until {$date->format('M j, Y')}";

        $this->event->setRepeat($this);
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
}
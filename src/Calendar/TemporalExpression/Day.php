<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\TemporalExpression;

/**
 * Class Day
 *
 * @package Calendar\TemporalExpression
 */
class Day
{
    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;

    /**
     * @var int
     */
    private $day;

    /**
     * @var array
     */
    private $map = [
        self::SUNDAY => 'Sunday',
        self::MONDAY => 'Monday',
        self::TUESDAY => 'Tuesday',
        self::WEDNESDAY => 'Wednesday',
        self::THURSDAY => 'Thursday',
        self::FRIDAY => 'Friday',
        self::SATURDAY => 'Saturday',
    ];

    /**
     * Day constructor.
     *
     * @param string $day
     * @throws \Exception
     */
    public function __construct($day)
    {
        $constant = strtoupper($day);

        if (!defined("self::$constant")) {
            throw new \Exception(sprintf('Invalid day given "%s"', $day));
        }

        $this->day = constant("self::$constant");
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->map[$this->day];
    }
}

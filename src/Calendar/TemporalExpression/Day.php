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
    const Sunday = 0;
    const Monday = 1;
    const Tuesday = 2;
    const Wednesday = 3;
    const Thursday = 4;
    const Friday = 5;
    const Saturday = 6;

    /**
     * @var int
     */
    private $day;

    /**
     * @var array
     */
    private $map = [
        self::Sunday => 'Sunday',
        self::Monday => 'Monday',
        self::Tuesday => 'Tuesday',
        self::Wednesday => 'Wednesday',
        self::Thursday => 'Thursday',
        self::Friday => 'Friday',
        self::Saturday => 'Saturday',
    ];

    /**
     * Day constructor.
     *
     * @param string $day
     * @throws \Exception
     */
    public function __construct($day)
    {
        if (!defined("self::$day")) {
            throw new \Exception(sprintf('Invalid day given "%s"', $day));
        }

        $this->day = constant("self::$day");
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
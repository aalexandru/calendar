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
     * @param int $day
     */
    public function __construct($day)
    {
        $this->day = $day;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->map[$this->day];
    }
}
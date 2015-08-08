<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\TemporalExpression;

class Month
{
    const January = 1;
    const February = 2;
    const March = 3;
    const April = 4;
    const May = 5;
    const June = 6;
    const July = 7;
    const August = 8;
    const September = 9;
    const October = 10;
    const November = 11;
    const December = 12;

    /**
     * @var int
     */
    private $month;

    /**
     * Month constructor.
     *
     * @param int $month
     */
    public function __construct($month)
    {
        $this->month = $month;
    }
}
<?php
/**
 * Author: Andrei ALEXANDRU <contact@andreialexandru.com>
 */

namespace Calendar\Event\Tag;

/**
 * Class Tag
 *
 * @package Calendar\Event\Tag
 */
class Tag
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Tag constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

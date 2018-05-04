<?php
/**
 * Defines a stack a Tower of Hanoi can be build on.
 *
 * A stack defines a location on the game board where to build a tower.
 * A stack can hold as many bricks as desired or none.
 */

namespace SM2014\TOH\Entity;

use SM2014\TOH\Util\Assertion;

/**
 * Class Stack
 *
 * @package SM2014TOHEntity
 */
class Stack
{
    /** @var int */
    protected $position;

    /** @var \SM2014\TOH\Entity\BrickInterface[] */
    protected $bricks = array();

    /**
     * @param int $position
     */
    public function __construct($position)
    {
        Assertion::integer($position);
        $this->position = $position;
    }
}

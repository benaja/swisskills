<?php
/**
 * Defines a brick used in the game.
 *
 * A brick represents one level of a Tower of Hanoi.
 * Each brick has a unique size and position.
 * The position of a brick is defined by a matrix of the
 * horizontal (stack) and vertical (level) position of the brick on the game board.
 */

namespace SM2014\TOH\Entity;

use SM2014\TOH\Util\Assertion;

/**
 * Class Brick
 *
 * @package SM2014TOHEntity
 */
class Brick
{
    /** @var int */
    private $size;

    /** @var array */
    private $position;

    /**
     * @param integer $size
     * @param array   $position
     */
    public function __construct($size, array $position = [0, 0])
    {
        Assertion::integerish($size);

        $this->size = (int)$size;
        $this->position = $position;
    }
}

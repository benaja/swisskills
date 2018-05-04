<?php
/**
 * Defines a stack a Tower of Hanoi can be build on.
 *
 * A stack defines a location on the game board where to build a tower.
 * A stack can hold as many bricks as desired or none.
 */

namespace SM2014\TOH\Entity;

/**
 * Interface StackInterface
 *
 * @package SM2014TOHEntity
 */
interface StackInterface
{
    /**
     * @return int
     */
    public function getPosition();

    /**
     * @return bool
     */
    public function hasBricks();

    /**
     * Adds a brick to a stack
     *
     * @param \SM2014\TOH\Entity\BrickInterface $brick
     */
    public function addBrick(BrickInterface $brick);

    /**
     * Removes a brick from the top of the stack
     */
    public function shiftBrick();

    /**
     * Determines the top level of the stack
     *
     * @return int
     */
    public function getTopLevel();

    /**
     * Provides the set of currently registered bricks.
     *
     * @return \SM2014\TOH\Entity\BrickInterface[]
     */
    public function getBricks();
}

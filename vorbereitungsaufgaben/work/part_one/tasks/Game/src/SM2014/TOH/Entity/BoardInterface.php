<?php
/**
 * Defines the board (gaming platform) of the game.
 *
 * The board does at least consist out of three stacks.
 */

namespace SM2014\TOH\Entity;

/**
 * Class BoardInterface
 *
 * @package SM2014TOHEntity
 */
interface BoardInterface
{
    /**
     * Moves the defined brick the set amount of levels to the right
     *
     * @param \SM2014\TOH\Entity\BrickInterface $brick
     * @param int                               $levelsToMove
     */
    public function moveToRight(BrickInterface $brick, $levelsToMove);

    /**
     * Moves the defined brick the set amount of levels to the left
     *
     * @param \SM2014\TOH\Entity\BrickInterface $brick
     * @param int                               $levelsToMove
     */
    public function moveToLeft(BrickInterface $brick, $levelsToMove);
}

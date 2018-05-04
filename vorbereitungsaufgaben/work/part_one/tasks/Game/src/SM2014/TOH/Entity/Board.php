<?php
/**
 * Defines the board (gaming platform) of the game.
 *
 * The board does at least consist out of three stacks.
 */

namespace SM2014\TOH\Entity;

use SM2014\TOH\Util\Assertion;

/**
 * Class Board
 *
 * @package SM2014TOHEntity
 */
class Board implements BoardInterface
{
    /** @var \SM2014\TOH\Entity\BrickInterface[] */
    private $bricks;
    /** @var \SM2014\TOH\Entity\StackInterface[] */
    private $stacks;

    /**
     * @param \SM2014\TOH\Entity\StackInterface[] $stackSet
     * @param \SM2014\TOH\Entity\BrickInterface[] $brickSet
     */
    public function __construct(array $stackSet, array $brickSet)
    {
        Assertion::minCount($stackSet, 3, 'List does not contain "3" stacks in minimum.');
        Assertion::minCount($brickSet, 3, 'List does not contain "3" levels in minimum.');

        $this->stacks = $stackSet;
        $this->bricks = $brickSet;
    }

    /**
     * Provides the set of currently defined stacks.
     *
     * @return \SM2014\TOH\Entity\StackInterface[]
     */
    public function getStacks()
    {
        return $this->stacks;
    }

    public function moveToRight(BrickInterface $brick, $levelsToMove){

    }

    /**
     * Moves the defined brick the set amount of levels to the left
     *
     * @param \SM2014\TOH\Entity\BrickInterface $brick
     * @param int                               $levelsToMove
     */
    public function moveToLeft(BrickInterface $brick, $levelsToMove){
        
    }
}

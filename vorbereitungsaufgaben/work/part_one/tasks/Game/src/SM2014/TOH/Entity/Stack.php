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
class Stack implements StackInterface
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

    /**
     * @return int
     */
    public function getPosition(){
        return $this->position;
    }

    /**
     * @return bool
     */
    public function hasBricks(){
        if(empty($this->bricks)){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Adds a brick to a stack
     *
     * @param \SM2014\TOH\Entity\BrickInterface $brick
     */
    public function addBrick(BrickInterface $brick){
        array_push($this->bricks, $brick);
    }

    /**
     * Removes a brick from the top of the stack
     */
    public function shiftBrick(){
        $topLevelBrick = $this->getTopLevel();
        array_pop($this->bricks);
    }

    /**
     * Determines the top level of the stack
     *
     * @return int
     */
    public function getTopLevel(){
        if(empty($this->bricks)){
            return null;
        }
        return $this->bricks[count($this->bricks)-1];
    }

    /**
     * Provides the set of currently registered bricks.
     *
     * @return \SM2014\TOH\Entity\BrickInterface[]
     */
    public function getBricks(){
        return $this->bricks;
    }
}

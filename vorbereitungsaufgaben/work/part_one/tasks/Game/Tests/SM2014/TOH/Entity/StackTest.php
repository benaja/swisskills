<?php
namespace SM2014\TOH\Entity;

use SM2014\TOH\Game_TestCase;

/**
 * Class StackTest
 *
 * @package SM2014TOHEntity
 */
class StackTest extends Game_TestCase
{
    /**
     * @covers \SM2014\TOH\Entity\Stack::hasBricks
     */
    public function testHasBricks()
    {
        $stack = new Stack(0);

        $this->assertFalse($stack->hasBricks());
    }

    /**
     * @covers \SM2014\TOH\Entity\Stack::hasBricks
     * @covers \SM2014\TOH\Entity\Stack::addBrick
     * @covers \SM2014\TOH\Entity\Stack::shiftBrick
     */
    public function testBrickManagement()
    {
        $stack = new Stack(0);
        $stack->addBrick(new Brick(1));
        $this->assertTrue($stack->hasBricks());

        $stack->shiftBrick();
        $this->assertFalse($stack->hasBricks());
    }

    /**
     * @covers \SM2014\TOH\Entity\Stack::getTopLevel
     */
    public function testGetTopLevelFromStackOfThree()
    {
        $stack = new Stack(0);
        $stack->addBrick(new Brick(1));
        $stack->addBrick(new Brick(2));
        $stack->addBrick(new Brick(3));

        $this->assertSame(2, $stack->getTopLevel());
    }

    /**
     * @covers \SM2014\TOH\Entity\Stack::getTopLevel
     */
    public function testGetTopLevelFromEmptyStack()
    {
        $stack = new Stack(0);

        $this->assertSame(0, $stack->getTopLevel());
    }
}

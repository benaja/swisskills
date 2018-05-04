<?php
namespace SM2014\TOH\Entity;

/**
 * Class BrickTest
 *
 * @package SM2014TOHEntity
 */
class BrickTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \SM2014\TOH\Entity\Brick::getSize
     * @covers \SM2014\TOH\Entity\Brick::__construct
     */
    public function testGetSize()
    {
        $brick = new Brick(200);

        $this->assertEquals(200, $brick->getSize());
    }

    /**
     * @covers \SM2014\TOH\Entity\Brick::getPosition
     * @covers \SM2014\TOH\Entity\Brick::setPosition
     */
    public function testPosition()
    {
        $brick = new Brick(200);
        $brick->setPosition([1, 1]);

        $this->assertEquals([1, 1], $brick->getPosition());
    }

    /**
     * @covers \SM2014\TOH\Entity\Brick::getStack
     * @covers \SM2014\TOH\Entity\Brick::setStack
     */
    public function testStack()
    {
        $brick = new Brick(200);
        $brick->setStack(1);

        $this->assertAttributeEquals([1, 0], 'position', $brick);
    }

    /**
     * @covers \SM2014\TOH\Entity\Brick::getLevel
     * @covers \SM2014\TOH\Entity\Brick::setLevel
     */
    public function testLevel()
    {
        $brick = new Brick(200);
        $brick->setLevel(0);

        $this->assertEquals(0, $brick->getLevel());
    }
}

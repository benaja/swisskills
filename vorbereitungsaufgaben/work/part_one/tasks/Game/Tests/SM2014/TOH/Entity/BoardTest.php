<?php

namespace SM2014\TOH\Entity;

use SM2014\TOH\Game_TestCase;

/**
 * Class BoardTest
 *
 * @package SM2014TOHEntity
 */
class BoardTest extends Game_TestCase
{
    protected $board;

    protected function setUp()
    {
        $bricks = $this->getBrickSet();
        $levels = $this->getStackSet();

        $this->board = new Board($levels, $bricks);
    }

    protected function tearDown()
    {
        unset($this->board);
    }


    /**
     * @dataProvider stackInRangeProvider
     * @covers       \SM2014\TOH\Entity\Board::stackInRange
     */
    public function testStackInRange($expected, $stack, $stacksToMove, $direction)
    {
        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($this->getStackSet(), $this->getBrickSet()))
            ->setMethods(array('stackInRange'))
            ->getProxy();

        $this->assertEquals($expected, $board->stackInRange($stack, $stacksToMove, $direction));
    }

    public function stackInRangeProvider()
    {
        return array(
            '2 to the right starting from 0' => array(true, 0, 2, 'right'),
            '2 to the right starting from 2' => array(false, 2, 2, 'right'),
            '2 to the left starting from 2'  => array(true, 2, 2, 'left'),
            '2 to the left starting from 1'  => array(false, 1, 2, 'left'),
        );
    }

    /**
     * @dataProvider stackInRangeExceptionProvider
     * @covers       \SM2014\TOH\Entity\Board::stackInRange
     */
    public function testStackInRangeExpectingException($level, $direction, $exception)
    {
        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($this->getStackSet(), $this->getBrickSet()))
            ->setMethods(array('stackInRange'))
            ->getProxy();

        $this->setExpectedException($exception);
        $board->stackInRange($level, 2, $direction);
    }

    public function stackInRangeExceptionProvider()
    {
        return array(
            'brick has negative level' => array(-1, 'right', '\OutOfRangeException'),
            'unsupported direction'    => array(1, 'unsupported', '\InvalidArgumentException'),
        );
    }

    /**
     * @dataProvider brickOnTopProvider
     * @covers       \SM2014\TOH\Entity\Board::brickIsOnTop
     */
    public function testBrickIsOnTopSameStack($expected, $brick)
    {

        $bricks = $this->getBrickSet();
        $stacks = $this->getStackSet();
        $stacks[0]->addBrick($bricks[0]);
        $stacks[0]->addBrick($bricks[2]);
        $stacks[0]->addBrick($bricks[1]);

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('brickIsOnTop'))
            ->getProxy();

        $this->assertEquals($expected, $board->brickIsOnTop($bricks[$brick]));
    }

    public function brickOnTopProvider()
    {
        return array(
            'widest brick on bottom level in 1st stack'     => array(false, 0),
            '2nd widest brick on bottom level in 1st stack' => array(false, 2),
            'smallest brick on bottom level in 1st stack'   => array(true, 1),
        );
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::brickIsOnTop
     */
    public function testTwoBricksIsOnTopDifferentStack()
    {
        $bricks = $this->getBrickSet();
        $stacks = $this->getStackSet();
        $stacks[0]->addBrick($bricks[1]);
        $stacks[1]->addBrick($bricks[0]);
        $stacks[1]->addBrick($bricks[2]);

        $bricks[0]->setPosition([1, 0]); // widest brick on 2nd stack on lowest position
        $bricks[2]->setPosition([1, 1]); // smallest brick on 2nd stack on highest position

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('brickIsOnTop'))
            ->getProxy();

        $this->assertFalse($board->brickIsOnTop($bricks[0]));
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::brickIsOnTop
     */
    public function testBrickIsOnTopDifferentStack()
    {
        $bricks = $this->getBrickSet();
        $stacks = $this->getStackSet();

        // move smallest brick to 2nd stack on lowest position
        $bricks[2]->setPosition([1, 0]);
        $stacks[1]->addBrick($bricks[2]);
        $stacks[0]->shiftBrick();


        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('brickIsOnTop'))
            ->getProxy();

        $this->assertTrue($board->brickIsOnTop($bricks[2]));
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::brickIsSmallerThanBrickPlacedOn
     */
    public function testBrickIsSmallerThanBrickPlacedOnNoBrickInTargetStack()
    {
        $bricks = $this->getBrickSet();
        $stack = $this->getStackSet();

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stack, $bricks))
            ->setMethods(array('brickIsSmallerThanBrickPlacedOn'))
            ->getProxy();

        // place the smallest brick on bottom position in stack 1 » true
        $this->assertTrue($board->brickIsSmallerThanBrickPlacedOn($bricks[0], $stack[1]));
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::brickIsSmallerThanBrickPlacedOn
     */
    public function testBrickIsSmallerThanBrickPlacedOn()
    {
        $stack = $this->getStackSet();
        $bricks = $this->getBrickSet();

        // reposition smallest brick to bottom position of stack 1
        $bricks[1]->setPosition([1, 0]);

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stack, $bricks))
            ->setMethods(array('brickIsSmallerThanBrickPlacedOn'))
            ->getProxy();

        // place the medium size brick on top of the smallest brick in stack 1 » false
        $this->assertFalse($board->brickIsSmallerThanBrickPlacedOn($bricks[2], $stack[1]));
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::placeOnTop
     */
    public function testPlaceOnTopEmptyStack()
    {
        $stacks = $this->getStackSet();
        $bricks = $this->getBrickSet();

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('placeOnTop'))
            ->getProxy();

        $board->placeOnTop($bricks[1], $stacks[1]);

        $this->assertEquals([1, 0], $bricks[1]->getPosition());
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::placeOnTop
     */
    public function testPlaceOnTop()
    {
        $stacks = $this->getStackSet();
        $bricks = $this->getBrickSet();

        // reposition medium brick to bottom position of stack 1
        $bricks[2]->setPosition([1, 0]);
        $stacks[1]->addBrick($bricks[2]);

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('placeOnTop'))
            ->getProxy();

        // reposition smallest brick to top position of stack 1
        $board->placeOnTop($bricks[1], $stacks[1]);

        $this->assertEquals([1, 1], $bricks[1]->getPosition());
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::moveToStackPossible
     */
    public function testMoveToStackPossible()
    {
        $bricks = $this->getBrickSet();
        $stacks = $this->getStackSet();
        $stacks[0]->addBrick($bricks[0]);
        $stacks[0]->addBrick($bricks[2]);
        $stacks[0]->addBrick($bricks[1]);

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('moveToStackPossible'))
            ->getProxy();

        $this->assertTrue($board->moveToStackPossible($bricks[1], 1, 'right'));
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::moveBrick
     * @covers \SM2014\TOH\Entity\Board::moveBToLeft
     * @covers \SM2014\TOH\Entity\Board::moveToRight
     */
    public function testMoveBrick()
    {
        $bricks = $this->getBrickSet();
        $stacks = $this->getStackSet();
        $stacks[0]->addBrick($bricks[0]);
        $stacks[0]->addBrick($bricks[2]);
        $stacks[0]->addBrick($bricks[1]);

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('moveBrick'))
            ->getProxy();

        $this->assertNull($board->moveBrick($bricks[1], 2, 'right'));
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::determineNewStack
     */
    public function testDetermineNewStack()
    {
        $stacks = $this->getStackSet();
        $bricks = $this->getBrickSet();

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('determineNewStack'))
            ->getProxy();

        $this->assertSame(1, $board->determineNewStack($bricks[1], 1, 'right'));
    }

    /**
     * @covers \SM2014\TOH\Entity\Board::determineNewStack
     */
    public function testDetermineNewStackExpectingException()
    {
        $stacks = $this->getStackSet();
        $bricks = $this->getBrickSet();

        $board = $this->getProxyBuilder('\SM2014\TOH\Entity\Board')
            ->setConstructorArgs(array($stacks, $bricks))
            ->setMethods(array('determineNewStack'))
            ->getProxy();

        $this->setExpectedException('\InvalidArgumentException');
        $board->determineNewStack($bricks[1], 1, 'unsupported Direction');
    }
}

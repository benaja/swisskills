<?php
/**
 * This test suite shall be used to implement a class named »BowlingGame«.
 */

require_once __DIR__ . '/../../tests/BowlingGameTestCase.php';
require_once __DIR__ . '/../../src/BowlingGame.php';
require_once __DIR__ . '/../../src/SpecialRollFactory.php';
require_once __DIR__ . '/../../src/AbstractSpecialRoll.php';


class BowlingGameTest extends BowlingGameTestCase
{
    /**
     * This tests verifies the circumstance that no pin has fallen after 20 ball rolls.
     */
    public function testScoreForGutterGameIs0()
    {
        $specialRollFactoryStub = $this->getSpecialRollFactoryStub();
        $specialRollFactoryStub
            ->expects($this->never())
            ->method('getSpare');
        $specialRollFactoryStub
            ->expects($this->never())
            ->method('getStrike');

        $game = new BowlingGame($specialRollFactoryStub);

        $this->rollMany($game, 20, 0);
        $this->assertEquals(0, $game->score());
    }

    /**
     * This test verifies the correct calculation of the score, if each roll has only knocked down one pin.
     */
    public function testScoreForAllOnesIs20()
    {
        $specialRollFactoryStub = $this->getSpecialRollFactoryStub();
        $specialRollFactoryStub
            ->expects($this->never())
            ->method('getSpare');
        $specialRollFactoryStub
            ->expects($this->never())
            ->method('getStrike');

        $game = new BowlingGame($specialRollFactoryStub);

        $this->rollMany($game, 20, 1);
        $this->assertEquals(20, $game->score());
    }

    /**
     * This test verifies the score calculation, if a spare and 3 pins where knocked down over the complete game.
     */
    public function testScoreForOneSpareAnd3Is16()
    {
        $spareStub = $this->getSpecialRollStub(13);

        $specialRollFactoryStub = $this->getSpecialRollFactoryStub();
        $specialRollFactoryStub
            ->expects($this->once())
            ->method('getSpare')
            ->willReturn($spareStub);
        $specialRollFactoryStub
            ->expects($this->never())
            ->method('getStrike');

        $game = new BowlingGame($specialRollFactoryStub);

        $this->rollSpare($game);
        $game->roll(3);
        $this->rollMany($game, 17, 0);

        $this->assertEquals(16, $game->score());
    }

    /**
     * This test verifies the score calculation, if a strike and 3 and 4 pins fell over the count of three rolls.
     */
    public function testScoreForOneStrikeAnd3And4Is24()
    {
        $strikeStub = $this->getSpecialRollStub(17);

        $specialRollFactoryStub = $this->getSpecialRollFactoryStub();
        $specialRollFactoryStub
            ->expects($this->never())
            ->method('getSpare');
        $specialRollFactoryStub
            ->expects($this->once())
            ->method('getStrike')
            ->willReturn($strikeStub);


        $game = new BowlingGame($specialRollFactoryStub);

        $this->rollStrike($game);
        $game->roll(3);
        $game->roll(4);
        $this->rollMany($game, 17, 0);

        $this->assertEquals(24, $game->score());
    }

    /**
     * This test verifies the correct score calculation over a perfect game (only strikes were thrown).
     */
    public function testScoreForPerfectGameIs300()
    {
        $strikeStub = $this->getSpecialRollStub(30);

        $specialRollFactoryStub = $this->getSpecialRollFactoryStub();
        $specialRollFactoryStub
            ->expects($this->never())
            ->method('getSpare');
        $specialRollFactoryStub
            ->expects($this->exactly(10))
            ->method('getStrike')
            ->willReturn($strikeStub);

        $game = new BowlingGame($specialRollFactoryStub);

        $this->rollMany($game, 12, 10);

        $this->assertEquals(300, $game->score());
    }


    /**
     * @return PHPUnit_Framework_MockObject_MockObject|\SpecialRollFactory
     */
    private function getSpecialRollFactoryStub()
    {
        return $this->getMockBuilder('\SpecialRollFactory')
            ->getMock();
    }

    /**
     * @param integer $score
     * @param integer $bonus
     *
     * @return PHPUnit_Framework_MockObject_MockObject|AbstractSpecialRoll
     */
    private function getSpecialRollStub($score = 0, $bonus = 0)
    {
        $stub = $this->getMockBuilder('\AbstractSpecialRoll')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        if (0 < $bonus) {
            $stub
                ->expects($this->atLeastOnce())
                ->method('getBonus')
                ->willReturn($bonus);
        }
        if (0 < $score) {
            $stub
                ->expects($this->atLeastOnce())
                ->method('getScore')
                ->willReturn($score);
        }

        return $stub;
    }
}


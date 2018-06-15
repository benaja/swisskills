<?php
/**
 * This test suite shall be used to implement a class named »BowlingGame« and its' relations to other classes.
 */

require_once __DIR__ . '/../../tests/BowlingGameTestCase.php';
require_once __DIR__ . '/../../src/BowlingGame.php';
require_once __DIR__ . '/../../src/SpecialRollFactory.php';


class BowlingGameIntegrationTest extends BowlingGameTestCase
{
    /** @var  BowlingGame */
    protected $game;

    /**
     * Does initialize the test environment before each test run.
     */
    protected function setUp()
    {
        $this->game = new BowlingGame(new SpecialRollFactory());
    }

    /**
     * This tests verifies the circumstance that no pin has fallen after 20 ball rolls.
     */
    public function testScoreForGutterGameIs0()
    {
        $this->rollMany($this->game, 20, 0);
        $this->assertEquals(0, $this->game->score());
    }

    /**
     * This test verifies the correct calculation of the score, if each roll has only knocked down one pin.
     */
    public function testScoreForAllOnesIs20()
    {
        $this->rollMany($this->game, 20, 1);
        $this->assertEquals(20, $this->game->score());
    }

    /**
     * This test verifies the score calculation, if a spare and 3 pins where knocked down over the complete game.
     */
    public function testScoreForOneSpareAnd3Is16()
    {
        $this->rollSpare($this->game);
        $this->game->roll(3);
        $this->rollMany($this->game, 17, 0);

        $this->assertEquals(16, $this->game->score());
    }

    /**
     * This test verifies the score calculation, if a strike and 3 and 4 pins fell over the count of three rolls.
     */
    public function testScoreForOneStrikeAnd3And4Is24()
    {
        $this->rollStrike($this->game);
        $this->game->roll(3);
        $this->game->roll(4);
        $this->rollMany($this->game, 17, 0);

        $this->assertEquals(24, $this->game->score());
    }

    /**
     * This test verifies the correct score calculation over a perfect game (only strikes were thrown).
     */
    public function testScoreForPerfectGameIs300()
    {
        $this->rollMany($this->game, 12, 10);

        $this->assertEquals(300, $this->game->score());
    }
}

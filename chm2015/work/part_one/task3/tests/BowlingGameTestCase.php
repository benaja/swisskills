<?php

class BowlingGameTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Helper to make it easy to setup the current game with a set of frames.
     *
     * @param integer $rolls
     * @param integer $pins
     */
    protected function rollMany(BowlingGame $game, $rolls, $pins)
    {
        for ($i = 0; $i < $rolls; ++$i) {
            $game->roll($pins);
        }
    }

    /**
     * Helper to indicate a spare was rolled within the current game.
     */
    protected function rollSpare(BowlingGame $game)
    {
        $game->roll(5);
        $game->roll(5);
    }

    /**
     * Helper to indicate a strike was rolled within the current game.
     */
    protected function rollStrike(BowlingGame $game)
    {
        $game->roll(10);
    }
}

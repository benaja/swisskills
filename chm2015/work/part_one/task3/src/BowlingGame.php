<?php
/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * The Bowling Game Rules
 *
 * The game consists of 10 frames.
 * In each frame the player has two opportunities to knock down 10 pins.
 * The score of a frame is the total number of pins knocked down, plus bonuses for spares or strikes.
 *
 * A spare is when a player knocks down 10 pins in two tries in one frame.
 * The bonus for that frame is the number of pins knocked down by the nex roll.
 *
 * A strike is when the player knocks down all 10 pins in his first try in a frame.
 * The bonus for that frame is the value of the next two balls rolled.
 *
 * In the tenth frame a player who rolls a spare or strike is allowed to roll the extra balls to complete the frame.
 * However no more than three ball can be rolled in the tenth frame.
 */

require_once __DIR__ . '/Spare.php';
require_once __DIR__ . '/Strike.php';

/**
 * Class BowlingGame
 *
 * This class actually defines the game.
 *
 * @todo inspect and understand the related test suites and implement the necessary methods accordingly.
 * @todo To get the maximum score every test case must be recognized.
 *
 * @link tests/unit/BowlingGameTest.php
 * @link tests/integration/BowlingGameIntegrationTest.php
 */
class BowlingGame
{
    // YOUR CODE GOES HERE
}

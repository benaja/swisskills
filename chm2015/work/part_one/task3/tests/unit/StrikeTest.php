<?php
/**
 * This test suite shall be used to implement a class named »Strike«.
 */

require_once __DIR__ . '/../../src/Strike.php';


class StrikeTest extends PHPUnit_Framework_TestCase
{
    /** @var  Spare */
    protected $spare;

    /**
     * Does initialize the test environment before each test run.
     */
    public function setUp()
    {
        $rolls = [10, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $frame = 0;

        $this->spare = new Strike($rolls, $frame);
    }

    /**
     * This test validates the correct calculation of the score.
     */
    public function testGetScore()
    {
        $this->assertEquals(17, $this->spare->getScore());
    }
    /**
     * This test validates the correct calculation of the bonus.
     */
    public function testGetBonus()
    {
        $this->assertEquals(7, $this->spare->getBonus());
    }
}

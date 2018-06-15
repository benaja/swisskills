<?php
/**
 * This test suite shall be used to implement a class named »Spare«.
 */

require_once __DIR__ . '/../../src/Spare.php';

class SpareTest extends PHPUnit_Framework_TestCase
{
    /** @var  Spare */
    protected $spare;

    /**
     * Does initialize the test environment before each test run.
     */
    public function setUp()
    {
        $rolls = [5, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $frame = 0;

        $this->spare = new Spare($rolls, $frame);
    }

    public function testGetScore()
    {
        $this->assertEquals(13, $this->spare->getScore());
    }

    public function testGetBonus()
    {
        $this->assertEquals(3, $this->spare->getBonus());
    }
}

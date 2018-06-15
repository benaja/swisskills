<?php
/**
 * This test suite shall be used to implement a class named »AbstractSpecialRoll«.
 */

require_once __DIR__. '/../../src/AbstractSpecialRoll.php';


class AbstractSpecialRollTest extends PHPUnit_Framework_TestCase
{
    /**
     * Determines the correct definition of class members.
     */
    public function testConstructor()
    {
        $roll = new SomeSpecialRoll([], 1);

        $this->assertAttributeEquals([], 'rolls', $roll);
        $this->assertAttributeEquals(1, 'frame', $roll);
    }
}

/** A dummy implementation to satisfy the tests. */
class SomeSpecialRoll extends AbstractSpecialRoll
{
    /**
     * Just a dummy implementation
     *
     * @return int
     */
    public function getBonus()
    {
        return 0;
    }

    /**
     * Just a dummy implementation
     *
     * @return int
     */
    public function getScore()
    {
        return 0;
    }
}

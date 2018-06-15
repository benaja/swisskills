<?php
/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHPUnit4
 *
 * @todo There is a mistake in the Test Case. Find and correct the error.
 *
 */

class StackTest extends PHPUnit_Framework_TestCase
{

    public function testPushAndPop()
    {
        $stack = [];
        array_push($stack, 'foo');
        $this->assertGreaterThan(2, count($stack));
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

}
?>

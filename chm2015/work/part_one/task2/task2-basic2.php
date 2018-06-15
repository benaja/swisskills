<?php
/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHPUnit2
 *
 * @todo There is a mistake in the Test Case. Find and correct the error.
 *
 */

class CheckSpecificNumber extends PHPUnit_Framework_TestCase
{

    public function testSubString()
    {
        $var = 0123546789;
        $this->assertEquals(3, substr($var, -5, 1));
    }

}
?>

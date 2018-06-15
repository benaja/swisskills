<?php

/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHPUnit1
 *
 * @todo There is a mistake in the Test Case. Find and correct the error.
 *
 */

class CountStringTest extends PHPUnit_Framework_TestCase
{

    public function testCheckStringLength()
    {
        $var = "Hello World";
        $this->assertEquals(10, strlen(trim($var)));
    }

}
?>

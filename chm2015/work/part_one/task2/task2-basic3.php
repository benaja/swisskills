<?php
/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHPUnit3
 *
 * @todo There is a mistake in the Test Case. Find and correct the error.
 *
 */

class NullTest extends PHPUnit_Framework_TestCase
{

    public function testNullValue()
    {
        $var = "null";
        $this->AssertNull($var);
    }

}
?>

<?php
/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHPUnit Advanced 1
 *
 * @todo There is a mistake in the Test Case. Find and correct the error.
 *
 */

class StubDummyClass
{
    public function doSomething()
    {
        $var = 'boo';

        return $var;
    }
}

class StubTest extends PHPUnit_Framework_TestCase
{
    public function testStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->getMock('StubDummyClass');

        $stub->expects($this->any())
             ->method('doSomething')
             ->will($this->returnValue('foo'));

        $this->assertEquals('boo', $stub->doSomething());
    }
}

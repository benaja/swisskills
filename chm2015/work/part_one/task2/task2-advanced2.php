<?php
/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHPUnit Advanced 2
 *
 * @todo Finish the Test Case!
 *       Write Asserts for the numbers in the function "onConsecutiveCalls",
 *       which are given as Parameter.
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
    public function testOnConsecutiveCallsStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->getMock('StubDummyClass');

        // Configure the stub.
        $stub->expects($this->any())
             ->method('doSomething')
             ->will($this->onConsecutiveCalls(1, 3, 3, 7));

        // add asserts here...
    }
}
?>

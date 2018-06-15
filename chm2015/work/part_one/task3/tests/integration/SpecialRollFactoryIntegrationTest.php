<?php
/**
 * This test suite shall be used to implement a class named »SpecialRollFactory« and its' relations to other classes.
 */

require_once __DIR__ . '/../../src/SpecialRollFactory.php';

class SpecialRollFactoryIntegrationTest extends PHPUnit_Framework_TestCase
{
    /**
     * Verifies the correct return value of method »getSpare«
     */
    public function testGetSpare()
    {
        $factory = new SpecialRollFactory();

        $this->assertInstanceOf('\Spare', $factory->getSpare([], 0));
    }

    /**
     * Verifies the correct return value of method »getStrike«
     */
    public function testGetStrike()
    {
        $factory = new SpecialRollFactory();

        $this->assertInstanceOf('\Strike', $factory->getStrike([], 0));
    }
}

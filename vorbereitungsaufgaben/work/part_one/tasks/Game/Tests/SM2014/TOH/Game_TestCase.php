<?php
namespace SM2014\TOH;

use lapistano\ProxyObject\ProxyBuilder;
use SM2014\TOH\Entity\Brick;
use SM2014\TOH\Entity\Stack;

/**
 * Class Game_TestCase
 *
 * @package SM2014
 */
abstract class Game_TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Provides an instance of the ProxyBuilder
     *
     * @param string $className
     *
     * @return \lapistano\ProxyObject\ProxyBuilder
     */
    protected function getProxyBuilder($className)
    {
        return new ProxyBuilder($className);
    }

    /**
     * @return \SM2014\TOH\Entity\Stack[]
     */
    protected function getStackSet()
    {
        $stack_0 = new Stack(0);
        $stack_1 = new Stack(1);
        $stack_2 = new Stack(2);

        return array($stack_0, $stack_1, $stack_2);
    }

    /**
     * @return \SM2014\TOH\Entity\Brick[]
     */
    protected function getBrickSet()
    {
        $brick_0_0 = new Brick(3, [0, 0]); // widest brick on bottom level in 1st stack
        $brick_0_1 = new Brick(2, [0, 1]); // 2nd widest brick on mid level in 1st stack
        $brick_0_2 = new Brick(1, [0, 2]); // smallest brick on top level in 1st stack

        return array(
            $brick_0_0, // biggest
            $brick_0_2, // smallest
            $brick_0_1 // medium
        );
    }
}

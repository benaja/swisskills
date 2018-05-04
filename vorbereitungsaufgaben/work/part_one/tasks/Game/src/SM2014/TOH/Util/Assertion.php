<?php

namespace SM2014\TOH\Util;

use Assert\Assertion as BaseAssertion;

/**
 * Class Assertion
 *
 * @package SM2014TOHUtil
 */
class Assertion extends BaseAssertion
{
    /**
     * Exception to throw when an assertion failed.
     *
     * @var string
     */
    static protected $exceptionClass = 'SM2014\TOH\Util\AssertionFailedException';


    /**
     * Assert that the count of countable is equal to count.
     *
     * @param array|\Countable $countable
     * @param int              $count
     * @param string           $message
     * @param string           $propertyPath
     * @return void
     * @throws \Assert\AssertionFailedException
     */
    static public function minCount($countable, $count, $message = null, $propertyPath = null)
    {
        if ($count > count($countable)) {
            $message = $message ?: sprintf(
                'List does not contain "%d" elements in minimum.',
                intval($count)
            );

            throw static::createException($countable, $message, static::INVALID_COUNT, $propertyPath, array('count' => $count));
        }
    }
}

<?php

/**
 * Check prime error
 *
 * @param int $a
 *
 * @todo change the isPrime() FUNCTION ONLY
 *       Known prime numbers for testing: 2, 3, 5, 53, 577, 1321, 1669, 10333
 *
 * @return int
 */
function isPrime ($a)
{
    for ($i = 0; $i < $a/2; $i++) {
        if ($a % $i == 0) {
            return false;
        }
    }
    return true;
}

if (!isPrime(10334) && isPrime(10333)) {
    $params['solvedErrors']['the prime error'] = true;
}



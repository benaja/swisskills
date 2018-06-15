<?php

/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHP Errors: Syntax Error 2
 *
 * @todo In the code below there is a syntax error hidden.
 *       Find and fix it.
 */

function countRecursive($array, $limit = 10) {
    $count = 0;
    foreach ($array as $id => $_array) {
        if (is_array($_array)) && $limit > 0) {
            $count += countRecursive($_array, $limit-1);
        }else{
            $count += 1;
        }
    }

    return $count;
}

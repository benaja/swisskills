<?php

/**
 * Iterator error
 *
 * @todo change the "while" loop only
 */

/**
 * "Dummy" import function
 *
 * @param string $name
 * @param int    $age
 *
 * @return int
 */
function import($name, $age) {
    //
    //  ... Performs some import functionality.
    //  ... Code is not relevant here.
    //
    // Returns 1 if import was successful for the counter
    return 1;
}

// prepare the array for import
$persons = [
    ['name' => 'Hans', 'age' => 14],
    ['name' => 'Berta', 'age' => 43],
    ['name' => 'Lisa', 'age' => 23],
    ['name' => 'Kevin', 'age' => 31],
];

// reset the counter
$couter = 0;

$personsObj = new ArrayObject ($persons);
$personsIterator = $personsObj->getIterator();

// import each record in $personsObj
while ($personsIterator->valid()) {
    $couter += import ($personsIterator->current()['name'], $personsIterator->current()['age']);
}

if (4 === $couter && import('test', 123) == 1) {
    $params['solvedErrors']['the iterator error'] = true;
}

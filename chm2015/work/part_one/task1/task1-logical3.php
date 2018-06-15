<?php

/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHP Errors: Logical Error 3
 *
 *  This script generates a random text based on a array of words.
 *  The number of the same word in the text depends on the number
 *  of letters the corresponding word has.
 *
 * @todo The script is not working correctly since each word only
 *       appears once in the end text. Try to fix the script by adding, deleting
 *       or changing only one character.
 */


function cloneArrayElement($array, $index, $number = 1) {

    // Get the array element that needs to be cloned
    $arrayElement = $array[$index];

    // save the original length
    $numOrigin = count($array);

    if($numOrigin-1 < $index) {
        throw new Exception('Index out of scope.');
    }

    for ($x = 0; $x < $number; $x++) {
        $num = array_push($array, $arrayElement);
    }

    if($num === $numOrigin + $number) {
        return $number;
    } else {
        throw new Exception('Not the right amount of clones created.');
    }
}

$wordArray = [
    'tholus',
    'velvetiness',
    'mercurify',
    'bezoar',
    'dopplerite',
    'allothigene',
    'Tanaidacea',
    'imperatrix',
    'vermouth',
    'sphericality',
    'hobbyism',
    'vasoconstrictor',
    'touchpiece',
    'satiny',
];

// now we need to clone every element
try{
    foreach($wordArray as $key => $word) {
        $number = cloneArrayElement($wordArray, $key, strlen($word));
        echo 'Cloned word ' . $word . ' '.$number.' times.' . "<br>\n";
    }
}
catch (Exception $e) {
   die('There was an error during the cloning ('.$e->getMessage().')');
}

echo "<br>\n";
echo 'New array size with clones: ' . count($wordArray) . "<br>\n";

echo "<br>\n";
echo "-----<br>\n";
echo 'Random text with all the words generated:' . "<br>\n";
// run another function for every element in the array with the clones
shuffle($wordArray);
foreach($wordArray as $word) {
    echo $word . ' ';
}
echo "<br>\n";
echo "-----<br>\n";

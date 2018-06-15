<?php

/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHP Errors: Logical Error 2
 *
 * The function below loads a tab separated text file as an array
 *
 * @todo The script is not working correctly Try to fix the
 *       function.
 */


/**
 * load a tab seperated text file as array
 *
 *  // example output:
 * $array = array(
 *     'line1'  => array('data-1-1', 'data-1-2', 'data-1-3'),
 *     'line2' => array('data-2-1', 'data-2-2', 'data-2-3'),
 *     'line3'  => array('data-3-1', 'data-3-2', 'data-3-3'),
 *     'line4' => array('foobar'),
 *     'line5' => array('hello world')
 * );
 *
 * @param  string  $filepath  [description]
 *
 * @return array
 */
function load_tabbed_file($filepath){
    $array = array();

    if (!file_exists($filepath)) { return $array; }
    $content = file($filepath);

    for ($x=0; $x < count($content); $x++){
        if (trim($content[$x]) != ''){
            $line = explode('\t', trim($content[$x]));
            $array[] = $line;
        }
    }
    return $array;
}

// load the values from a text file
$array = load_tabbed_file('data.txt',true);


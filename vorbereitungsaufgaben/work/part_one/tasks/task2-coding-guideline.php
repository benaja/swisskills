<?php

/**
 * The coding guideline example class - comment block mandatory
 *
 * code indentation using 4 spaces, not tabs
 */
class CodingGuideline
{
    /**
     * Test function - comment block mandatory
     *
     * @param Type  $type
     * @param array $array
     *
     * @return string
     */
    public function testFunction(Type $type, array $array)
    {
        // camel case for variable names
        $leftVar  = 'Left'; // no double quotes are used
        $rightVar = 'Right'; // no double quotes are used

        // spaces between if ( and ) {
        if ($left === $right) { // opening and closing braces for control structures are on the same line

            return 'same same'; // blank line before return statement
        } elseif ('Left' === $left) { // opening and closing braces for control structures are on the same line

            return $left; // blank line before return statement
        }

        return 'not the same'; // blank line before return statement
    }
}
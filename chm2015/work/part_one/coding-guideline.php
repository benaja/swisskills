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
        // camel case for variables
        $leftVar  = 'Left';
        $rightVar = 'Right';

        // spaces between if ( and ) {
        if ($left === $right) {

            return 'same same'; // blank line before return statement
        } elseif ('Left' === $left) {

            return $left; // blank line before return statement
        }

        return 'not the same'; // blank line before return statement
    }
}

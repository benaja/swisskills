<?php

/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHP Errors: Syntax Error 1
 *
 * @todo In the code below there is a syntax error hidden.
 *       Find and fix it.
 */

if (!function_exists('breadcrumb')) {
    function breadcrumb($data = array()) {
        $breadcrumb = '<ul class="breadcrumb">'."\n";;
        if (isset($data)) {
            foreach ($data as $link) {
                if((isset($link[2])) AND ($link[2] === true)) {
                    $breadcrumb .= '<li class="active"><span>'.$link[1].'</span></li>'."\n";
                } else {
                    $breadcrumb .= '<li><a href="'.$link[0].'">'.$link[1].'</a></li>'."\n";
                }
            }
        }
        $breadcrumb .= '</ul>'"\n";

        return $breadcrumb;
    }
}

// Below is an example of how to generate the breadcrumb
$breadcrumb = array(
    array('http://localhost/', 'Home'),
    array('', 'Register', true),
);

echo breadcrumb($breadcrumb);

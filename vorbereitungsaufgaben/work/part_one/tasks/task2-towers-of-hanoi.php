<?php

use Assert\Assertion;
use SM2014\TOH\Entity\Board;
use SM2014\TOH\Entity\Brick;
use SM2014\TOH\Entity\Stack;

// program the functionality here

/**
 * in game position of the game
 *
 * difficulty 3
 */
$params = array(
    'game' => array(
        'flash'  => false,
        'stacks' => array(
            array(
                array('size' => 0),
                array('size' => 0),
                // the selectable param has to be set
                // for all bricks that can be moved
                array('size' => 3, 'selectable' => true),
            ),
            array(
                array('size' => 0),
                // the selectable param has to be set
                // for all bricks that can be moved
                array('size' => 1, 'selectable' => true),
                array('size' => 2),
            ),
            array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            ),
        ),
    ),
);

/**
 * in game position of the game
 * with an error message
 *
 * difficulty 3
 */
$params = array(
    'game' => array(
        'flash'  => array(
            'type'  => 'warning',
            'title' => 'Move not allowed!',
            'text'  => 'You are not allowed to move the brick on a smaller brick.',
        ),
        'stacks' => array(
            array(
                array('size' => 0),
                array('size' => 0),
                // the selectable param has to be set
                // for all bricks that can be moved
                array('size' => 3, 'selectable' => true),
            ),
            array(
                array('size' => 0),
                // the selectable param has to be set
                // for all bricks that can be moved
                array('size' => 1, 'selectable' => true),
                array('size' => 2),
            ),
            array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            ),
        ),
    ),
);

/**
 * success state
 *
 * redirects back to the start page
 */
$params['game']['successful'] = true;

/**
 * no game started yet
 *
 * redirect the user to the start page
 */
$params['game']['restart'] = true;

/**
 * start position of the game
 *
 * difficulty 3
 */
$params = array(
    'game' => array(
        'flash'  => false,
        'stacks' => array(
            array(
                // the selectable param has to be set
                // for all bricks that can be moved
                array('size' => 1, 'selectable' => true),
                array('size' => 2),
                array('size' => 3),
            ),
            array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            ),
            array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            ),
        ),
    ),
);

/**
 * start position of the game
 *
 * difficulty 4
 */
$params = array(
    'game' => array(
        'flash'  => false,
        'stacks' => array(
            array(
                // the selectable param has to be set
                // for all bricks that can be moved
                array('size' => 1, 'selectable' => true),
                array('size' => 2),
                array('size' => 3),
                array('size' => 4),
            ),
            array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            ),
            array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            ),
            array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            ),
        ),
    ),
);
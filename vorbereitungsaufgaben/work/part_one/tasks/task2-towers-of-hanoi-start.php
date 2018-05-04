<?php

// start with success message
$params = array(
    'game' => array(
        'flash' => array(
            'type'  => 'success',
            'title' => 'Success!',
            'text'  => 'You finished the game. You are awesome! To be more awesome, you can complete the game even faster.'
        ),
        'difficulties' => array(
            'three' => array(
                'size' => 3,
                'name' => 'three',
            ),
            'four' => array(
                'size' => 4,
                'name' => 'four',
            ),
        )
    ),
);

// start page wihout message
$params = array(
    'game' => array(
        'difficulties' => array(
            'three' => array(
                'size' => 3,
                'name' => 'three',
            ),
            'four' => array(
                'size' => 4,
                'name' => 'four',
            ),
        )
    ),
);